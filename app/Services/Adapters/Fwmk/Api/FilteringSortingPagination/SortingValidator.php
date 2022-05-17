<?php

namespace App\Services\Adapters\Fwmk\Api\FilteringSortingPagination;

use App\Enums\GlobalSortingKeys;

trait SortingValidator
{
    /**
     * Validate sorting with global sorting properties.
     *
     * @param string|null $sortingKey
     * @return array
     */
    private function validateSorting(?string $sortingKey): array
    {
        $sorting = [];

        if (!GlobalSortingKeys::hasValue($sortingKey)) {
            return $sorting;
        }

        $sorting = [$sortingKey => 'desc'];

        return $sorting;
    }
}
