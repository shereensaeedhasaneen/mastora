<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\AbstractService;

/**
 * Base BackEndController of all Dash controller
 *
 */
class AbstractController extends Controller
{
    //use ExportExcel;
    /**
     * Repository
     *
     * @var \App\Repositories\Contracts\RepositoryInterface
     */
    protected $repo;

    /**
     * Entity name
     *
     * @var string
     */
    protected $entity;

    /**
     * Entity services
     *
     * @var \App\Services\AbstractService
     */
    protected $service;

    /**
     * route prefix
     *
     * @var string
     */
    protected $routePrefix = '';

    /**
     * Redirect To specific route if user have permission otherwise redirect back.
     *
     * @param $route
     * @param $itemName
     * @param array $filters
     * @param string $messageType
     * @param bool $redirectBack
     * @return mixed
     */
    protected function redirectWithPermission($route, $itemName, $messageType = 'update', $filters = [], $redirectBack = false)
    {
        if ($redirectBack) {
            $redirection = back();
        } else {
            if (auth()->user()->can(getRoutePermission($route, $this->routePrefix))) {
                $redirection = redirect()->route($route, $filters);
            } else {
                $redirection = back();
            }
        }

        return $redirection->withSuccess(__("messages.success.$messageType", [
            'entity' => $this->entity,
            'item' => toHtmlEntities($itemName),
        ]));
    }
}
