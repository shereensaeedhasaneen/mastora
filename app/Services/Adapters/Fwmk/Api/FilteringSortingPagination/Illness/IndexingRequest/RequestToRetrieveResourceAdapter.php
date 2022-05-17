<?php

namespace App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Illness\IndexingRequest;

use Illuminate\Http\Request;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\SortingValidator;

class RequestToRetrieveResourceAdapter implements RequestToRetrieveResourceInterface
{
    use SortingValidator;

    /**
     * Convert request parameters to service retrieveResource method arguments.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function convert(Request $request): array
    {
        $limit = $request->input('limit');
        $sort = $request->input('sort');
        $recommended = $request->input('recommended');

        $filter = [];
        $with = [];
        $paginate = true;
        $perPage = $limit;
        $sorting = [];

        $filter = $this->validateRecommendedFilter($filter, $recommended);
        $sorting = $this->validateSorting($sort);

        // The order of the elements of the array below is mandatory.
        $arguments = [];
        $arguments[] = $filter;
        $arguments[] = $with;
        $arguments[] = $paginate;
        $arguments[] = $perPage;
        $arguments[] = $sorting;

        return $arguments;
    }

    /**
     * Validate recommended request parameter.
     *
     * @param array $filter
     * @param string|null $recommended
     * @return array
     */
    private function validateRecommendedFilter(array $filter, ?string $recommended): array
    {
        if (empty($recommended)) {
            return $filter;
        }

        $filter['relative']['recommended'] = filter_var($recommended, FILTER_VALIDATE_BOOLEAN);
        return $filter;
    }
}
