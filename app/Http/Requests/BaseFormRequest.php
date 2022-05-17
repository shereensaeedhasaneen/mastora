<?php

namespace App\Http\Requests;

use App\Enums\SystemRoles;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Exception;
use Illuminate\Support\Str;
use App\Models\Permission;

class BaseFormRequest extends FormRequest
{
    /**
     * set default values.
     *
     * @var array
     */
    protected $defaultValues = [];

    /**
     * Route group prefix name
     *
     * @var string
     */
    protected $routeGroupName = '';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @throws \Exception
     */
    public function authorize(): bool
    {
        $permissionName = $this->extractAndValidatePermission();

        if (\Auth::guest()) {
            return $this->handleAnonymous($permissionName);
        }

        return $this->checkUserRolesHasPermissionTo($permissionName);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @throws \Exception
     */
    public function rules()
    {
        // Special handling for specific action name
        $method = Str::title($this->method()).Str::studly($this->route()->getActionMethod()).'Rules';

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        $callbackName = Str::title($this->method()).'Rules';
        if (method_exists($this, $callbackName)) {
            return ($this->{$callbackName}());
        }

        return [];
    }

    /**
     * Handle anonymous request permissions
     *
     * @param $permissionName
     * @return bool
     */
    protected function handleAnonymous($permissionName): bool
    {
        $anonymousRole = SystemRoles::APPLICANT;
        $role = Role::findByName($anonymousRole);

        return $role->hasPermissionTo($permissionName);
    }

    /**
     * Resolve permission name from route
     *
     * @return string
     * @throws Exception
     */
    protected function resolvePermissionName(): string
    {
        $routeName = str_replace($this->routeGroupName, '', $this->route()->getName());
        $routeNameArr = explode('.', $routeName);
        if (count($routeNameArr) !== 2) {
            throw new Exception('Could not resolve permission name from route.');
        }

        $resourceName = $routeNameArr[0];
        $action = $routeNameArr[1];

        return config('roles-permissions.crud_of_resources')[$action].' '.$resourceName;
    }

    /**
     * Extract and validate permissions name from request
     *
     * @return string $permissionName
     * @throws Exception
     */
    protected function extractAndValidatePermission(): string
    {
        $permissionName = $this->resolvePermissionName();
        $permissionExist = Permission::whereName($permissionName)->first();

        if (! $permissionExist) {
            throw new Exception("Permission {$permissionName} not exist in permissions list.");
        }

        return $permissionName;
    }

    /**
     * Check if the user assigned roles has permission.
     *
     * @param $permission_name
     * @return bool
     */
    protected function checkUserRolesHasPermissionTo($permission_name): bool
    {
        // Get the user user roles by getting the intersection between system roles and user roles.
        $userRoleNames = $this->user()->getRoleNames()->toArray();
        $roleQuery = Role::query();
        if ($this->routeIs('api.*')) {
            $roleQuery->where('is_admin_role', '=', true);
        }
        $userAssignedRoleNames = $roleQuery->pluck('name')->toArray();
        $userRoles = array_intersect($userRoleNames, $userAssignedRoleNames);
        // Check if user roles has permission.
        foreach ($userRoles as $userRole) {
            $role = Role::findByName($userRole);
            if ($role->hasPermissionTo($permission_name)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (count($this->defaultValues)) {
            $data = $this->all();
            foreach ($this->defaultValues as $key => $value) {
                data_set($data, $key, data_get($data, $key, $value));
            }

            $this->merge($data);
        }
    }

    /**
     * Get all filters keys and values of request
     *
     * @return array
     */
    public function getRequestFilters()
    {
        return $this->input('filter');
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return collect($this->customAttributes())->map(function ($item, $key) {
            return __("validation.attributes.{$item}");
        })->toArray();
    }

    /**
     * Validate captcha
     *
     * @return bool
     * @throws \Exception
     */
    protected function validateCaptcha()
    {
        $input = $this->input('recaptcha_token');

        if (! filled($input)) {
            throw new Exception('recaptcha_token field is required.', 422);
        }

        $response = resolve('recaptcha')->validate($input);
        if ($response['success'] === false) {
            throw new \Exception(__('Invalid submitted captcha.'), 422);
        }

        return true;
    }

    /**
     * Custom Mapping Attributes
     *
     * @return array
     */
    public function customAttributes()
    {
        return [];
    }
}
