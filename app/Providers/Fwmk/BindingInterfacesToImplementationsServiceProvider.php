<?php

namespace App\Providers\Fwmk;

use Illuminate\Support\ServiceProvider;
// use App\Services\Adapters\Fwmk\BladeComponents\Form\CustomHasMany\Consume;
// use App\Services\Adapters\Fwmk\BladeComponents\Form\CustomHasMany\Provide;
// use App\Services\Adapters\Fwmk\BladeComponents\Form\InputFile\Consume\SpatieMediaLibrary\MediaLibraryToInputFileAdapter;
// use App\Services\Adapters\Fwmk\BladeComponents\Form\InputFile\Consume\SpatieMediaLibrary\MediaLibraryToInputFileInterface;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest\RequestToRetrieveResourceAdapter as LoanIndexingRequestRequestToRetrieveResourceAdapter;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Loan\IndexingRequest\RequestToRetrieveResourceInterface as LoanIndexingRequestRequestToRetrieveResourceInterface;

use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Relative\IndexingRequest\RequestToRetrieveResourceAdapter as RelativeIndexingRequestRequestToRetrieveResourceAdapter;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Relative\IndexingRequest\RequestToRetrieveResourceInterface as RelativeIndexingRequestRequestToRetrieveResourceInterface;

use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Cost\IndexingRequest\RequestToRetrieveResourceAdapter as CostIndexingRequestRequestToRetrieveResourceAdapter;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Cost\IndexingRequest\RequestToRetrieveResourceInterface as CostIndexingRequestRequestToRetrieveResourceInterface;

use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Illness\IndexingRequest\RequestToRetrieveResourceAdapter as IllnessIndexingRequestRequestToRetrieveResourceAdapter;
use App\Services\Adapters\Fwmk\Api\FilteringSortingPagination\Illness\IndexingRequest\RequestToRetrieveResourceInterface as IllnessIndexingRequestRequestToRetrieveResourceInterface;

class BindingInterfacesToImplementationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MediaLibraryToInputFileInterface::class,
            MediaLibraryToInputFileAdapter::class
        );

        $this->app->bind(
            DiningIndexingRequestRequestToRetrieveResourceInterface::class,
            DiningIndexingRequestRequestToRetrieveResourceAdapter::class
        );

        $this->app->bind(
            LoanIndexingRequestRequestToRetrieveResourceInterface::class,
            LoanIndexingRequestRequestToRetrieveResourceAdapter::class
        );

        $this->app->bind(
            RelativeIndexingRequestRequestToRetrieveResourceInterface::class,
            RelativeIndexingRequestRequestToRetrieveResourceAdapter::class
        );
        
        $this->app->bind(
            CostIndexingRequestRequestToRetrieveResourceInterface::class,
            CostIndexingRequestRequestToRetrieveResourceAdapter::class
        );
        
        $this->app->bind(
            IllnessIndexingRequestRequestToRetrieveResourceInterface::class,
            IllnessIndexingRequestRequestToRetrieveResourceAdapter::class
        );
        
        /*
        |--------------------------------------------------------------------------
        |  CUSTOM HAS MANY 
        |--------------------------------------------------------------------------
        */
        $this->app->bind(
            Consume\LoanAdditionalService\LoanAdditionalServicesToCustomHasManyInterface::class,
            Consume\LoanAdditionalService\LoanAdditionalServicesToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\LoanAdditionalService\CustomHasManyToLoanAdditionalServicesInterface::class,
            Provide\LoanAdditionalService\CustomHasManyToLoanAdditionalServicesAdapter::class
        );
        $this->app->bind(
            Consume\LoanAvailableDate\LoanAvailableDatesToCustomHasManyInterface::class,
            Consume\LoanAvailableDate\LoanAvailableDatesToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\LoanAvailableDate\CustomHasManyToLoanAvailableDatesInterface::class,
            Provide\LoanAvailableDate\CustomHasManyToLoanAvailableDatesAdapter::class
        );
        $this->app->bind(
            Consume\LoanStop\LoanStopsToCustomHasManyInterface::class,
            Consume\LoanStop\LoanStopsToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\LoanStop\CustomHasManyToLoanStopsInterface::class,
            Provide\LoanStop\CustomHasManyToLoanStopsAdapter::class
        );
        $this->app->bind(
            Consume\Contact\ContactsToCustomHasManyInterface::class,
            Consume\Contact\ContactsToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\Contact\CustomHasManyToContactsInterface::class,
            Provide\Contact\CustomHasManyToContactsAdapter::class
        );
        $this->app->bind(
            Consume\CustomFieldValue\CustomFieldValuesToCustomHasManyInterface::class,
            Consume\CustomFieldValue\CustomFieldValuesToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\CustomFieldValue\CustomHasManyToCustomFieldValuesInterface::class,
            Provide\CustomFieldValue\CustomHasManyToCustomFieldValuesAdapter::class
        );
        $this->app->bind(
            consume\PricePlan\PricePlansToCustomHasManyInterface::class,
            consume\PricePlan\PricePlansToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\PricePlan\CustomHasManyToPricePlansInterface::class,
            Provide\PricePlan\CustomHasManyToPricePlansAdapter::class
        );
        $this->app->bind(
            Consume\RealEstatePropertyFloorPlan\RealEstatePropertyFloorPlansToCustomHasManyInterface::class,
            Consume\RealEstatePropertyFloorPlan\RealEstatePropertyFloorPlansToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\RealEstatePropertyFloorPlan\CustomHasManyToRealEstatePropertyFloorPlansInterface::class,
            Provide\RealEstatePropertyFloorPlan\CustomHasManyToRealEstatePropertyFloorPlansAdapter::class
        );
        $this->app->bind(
            consume\CustomPickup\CustomPickupsToCustomHasManyInterface::class,
            consume\CustomPickup\CustomPickupsToCustomHasManyAdapter::class
        );
        $this->app->bind(
            Provide\CustomPickup\CustomHasManyToCustomPickupsInterface::class,
            Provide\CustomPickup\CustomHasManyToCustomPickupsAdapter::class
        );
   
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
