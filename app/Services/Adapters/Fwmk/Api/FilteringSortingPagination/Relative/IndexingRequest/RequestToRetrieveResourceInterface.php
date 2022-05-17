<?php

namespace App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Relative\IndexingRequest;

use Illuminate\Http\Request;

interface RequestToRetrieveResourceInterface
{

    /**
     * Convert request parameters to service retrieveResource method arguments.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function convert(Request $request): array;
}
