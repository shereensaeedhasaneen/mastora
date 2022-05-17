<?php 
use Illuminate\Support\Str;

if (!function_exists('getModelName')) {
    /**
     * Get Model name of specific object
     *
     * @param  \Illuminate\Database\Eloquent\Model|string  $modelObject
     * @return string
     */
    function getModelName($modelObject)
    {
        $className = is_string($modelObject) ? $modelObject : get_class($modelObject);
        $appModelPath = config('repo.appModelsPath');

        return Str::kebab(str_replace($appModelPath, '', $className));
    }
}


if (!function_exists('requestedRoutePermissions')) {
    /**
     * Getting related permissions with current current request route.
     *
     * @return array
     */
    function currentRoutePermissions(): array
    {
        $explodedRouteName = explode('.', request()->route()->getName());
        $resourceName = $explodedRouteName[0];
        $actionName = $explodedRouteName[1];

        $resourcesActionsPermissions = config('privileges.resources_actions_permissions');
        $routePermissions = $resourcesActionsPermissions[$resourceName][$actionName];
        return $routePermissions;
    }
}

if (!function_exists('isDefaultLanguage')) {
    /**
     * Check if $translationLanguage argument is the default application 
     * translation language.
     *
     * @return array
     * @return bool
     */
    function isDefaultLanguage(string $translationLanguage): bool
    {
        return (config('localization.default_translation_language') == $translationLanguage);
    }
}

if (!function_exists('fillingTranslation')) {
    /**
     * Add to request data an associative array its key as translation code and its value the request data.
     *
     * @param array $request
     * @return array
     */
    function fillingTranslation(array $requestData): array
    {
        $language = $requestData['translation_language'];
        $data = $requestData;
        $data['filling_translation'][$language] = $requestData;
        return $data;
    }
}

if (!function_exists('filterModelTranslatedAttributesWithFormELements')) {
    /**
     * Filter form elements from model translatedAttributes property.
     *
     * @param array $elements
     * @param array $translatedAttributes
     * @param string $translationLanguage
     * @return array
     */
    function filteringFormELementsFromModelTranslatedAttributes(
        array $elements,
        array $translatedAttributes,
        string $translationLanguage
    ): array {
        if (empty($translatedAttributes)) return $elements;
        if (isDefaultLanguage($translationLanguage)) return $elements;

        $filteredElements = array_filter($elements, function ($element) use ($translatedAttributes) {
            $elementName = str_replace('[]', '', $element['name']);
            return in_array($elementName, $translatedAttributes);
        });

        return $filteredElements;
    }
}