<?php

namespace App\Models\Relationships\User;

use App\Models;

/**
 * Entities that are last updated by specific user.
 */
trait LastUpdatedEntities
{
    /**
     * Getting users that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedUsers()
    {
        return $this->hasMany(Models\User::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tourism Agencies that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourismAgencies()
    {
        return $this->hasMany(Models\TourismAgency::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tours that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTours()
    {
        return $this->hasMany(Models\Tour::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Accessibilities that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourAccessibilities()
    {
        return $this->hasMany(Models\TourAccessibility::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Additional Services that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourAdditionalServices()
    {
        return $this->hasMany(Models\TourAdditionalService::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Extras that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourExtras()
    {
        return $this->hasMany(Models\TourExtra::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Know Before You Gos that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourKnowBeforeYouGos()
    {
        return $this->hasMany(Models\TourKnowBeforeYouGo::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Inclusions that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourInclusions()
    {
        return $this->hasMany(Models\TourInclusion::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Attractions that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourAttractions()
    {
        return $this->hasMany(Models\TourAttraction::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Cancellation Policies that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourCancellationPolicies()
    {
        return $this->hasMany(Models\TourCancellationPolicy::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourTypes()
    {
        return $this->hasMany(Models\TourType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Categories that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourCategories()
    {
        return $this->hasMany(Models\TourCategory::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Reservations that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourReservations()
    {
        return $this->hasMany(Models\TourReservation::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Available Dates that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourAvailableDates()
    {
        return $this->hasMany(Models\TourAvailableDate::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Schedules that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourSchedules()
    {
        return $this->hasMany(Models\TourSchedule::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Locations that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedLocations()
    {
        return $this->hasMany(Models\Location::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Guides that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourGuides()
    {
        return $this->hasMany(Models\TourGuide::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Medias that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedMedias()
    {
        return $this->hasMany(Models\Media::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Contacts that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedContacts()
    {
        return $this->hasMany(Models\Contact::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Qr Codes that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedQrCodes()
    {
        return $this->hasMany(Models\QrCode::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Translation Languages that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTranslationLanguages()
    {
        return $this->hasMany(Models\TranslationLanguage::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Custom Field that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedCustomField()
    {
        return $this->hasMany(Models\CustomField::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Custom Field Values that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedCustomFieldValues()
    {
        return $this->hasMany(Models\CustomFieldValue::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dinings that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDinings()
    {
        return $this->hasMany(Models\Dining::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Reservation Requests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningReservationRequests()
    {
        return $this->hasMany(Models\DiningReservationRequest::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Categories that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningCategories()
    {
        return $this->hasMany(Models\DiningCategory::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningTypes()
    {
        return $this->hasMany(Models\DiningType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Dress Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningDressTypes()
    {
        return $this->hasMany(Models\DiningDressType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Highlights that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningHighlights()
    {
        return $this->hasMany(Models\DiningHighlight::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Menus that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningMenus()
    {
        return $this->hasMany(Models\DiningMenu::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Dining Allergens that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDiningAllergens()
    {
        return $this->hasMany(Models\DiningMenuItem::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Vouchers that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedVouchers()
    {
        return $this->hasMany(Models\Voucher::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Providers that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceProviders()
    {
        return $this->hasMany(Models\ServiceProvider::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Real Estate Properties that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedRealEstateProperties()
    {
        return $this->hasMany(Models\RealEstateProperty::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Exclusive Deals that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedExclusiveDeals()
    {
        return $this->hasMany(Models\ExclusiveDeal::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Property Rent Requests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedPropertyRentRequests()
    {
        return $this->hasMany(Models\PropertyRentRequest::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Property Buy Requests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedPropertyBuyRequests()
    {
        return $this->hasMany(Models\PropertyBuyRequest::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Property Management Requests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedPropertyManagementRequests()
    {
        return $this->hasMany(Models\PropertyManagementRequest::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Property Management Packages that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedPropertyManagementPackages()
    {
        return $this->hasMany(Models\PropertyManagementPackage::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Property Management Services that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedPropertyManagementServices()
    {
        return $this->hasMany(Models\PropertyManagementService::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Real Estate Property Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedRealEstatePropertyTypes()
    {
        return $this->hasMany(Models\RealEstatePropertyType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Real Estate Property Features that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedRealEstatePropertyFeatures()
    {
        return $this->hasMany(Models\RealEstatePropertyFeature::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Main Categories that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceMainCategories()
    {
        return $this->hasMany(Models\ServiceMainCategory::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Sub Categories that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceSubCategories()
    {
        return $this->hasMany(Models\ServiceSubCategory::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Services that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServices()
    {
        return $this->hasMany(Models\Service::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceTypes()
    {
        return $this->hasMany(Models\ServiceType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Inclusions that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceInclusions()
    {
        return $this->hasMany(Models\ServiceInclusion::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Requests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServiceRequests()
    {
        return $this->hasMany(Models\ServiceRequest::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Packages that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServicePackages()
    {
        return $this->hasMany(Models\ServicePackage::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Package Types that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServicePackageTypes()
    {
        return $this->hasMany(Models\ServicePackageType::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Service Package Inclusions that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedServicePackageInclusions()
    {
        return $this->hasMany(Models\ServicePackageInclusion::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Tour Child Policies that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedTourChildPolicies()
    {
        return $this->hasMany(Models\TourChildPolicy::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Devices that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedDevices()
    {
        return $this->hasMany(Models\Device::class, 'last_updater_id', 'id');
    }

    /**
     * Getting Real Estate Property Point Of Interests that updated by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastUpdatedRealEstatePropertyPointOfInterests()
    {
        return $this->hasMany(Models\Device::class, 'last_updater_id', 'id');
    }
}
