<?php

namespace App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Cost\IndexingRequest;

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

        $filter = [];
        $with = [];
        $paginate = true;
        $perPage = $limit;
        $sorting = [];

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

}
