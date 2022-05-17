<?php

namespace App\Models\Relationships\User;

use App\Models;

/**
 * Entities that are created by specific user.
 */
trait CreatedEntities
{
    /**
     * Getting Users that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdUsers()
    {
        return $this->hasMany(Models\User::class, 'creator_id', 'id');
    }

    /**
     * Getting Tourism Agencies that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourismAgencies()
    {
        return $this->hasMany(Models\TourismAgency::class, 'creator_id', 'id');
    }

    /**
     * Getting Tours that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTours()
    {
        return $this->hasMany(Models\Tour::class, 'creator_id', 'id');
    }
    /**
     * Getting Tour Accessibilities that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourAccessibilities()
    {
        return $this->hasMany(Models\TourAccessibility::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Additional Services that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourAdditionalServices()
    {
        return $this->hasMany(Models\TourAdditionalService::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Extras that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourExtras()
    {
        return $this->hasMany(Models\TourExtra::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Know Before You Gos that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourKnowBeforeYouGos()
    {
        return $this->hasMany(Models\TourKnowBeforeYouGo::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Inclusions Before You Gos that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourInclusions()
    {
        return $this->hasMany(Models\TourInclusion::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Attractions Before You Gos that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourAttractions()
    {
        return $this->hasMany(Models\TourAttraction::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Cancellation Policies that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourCancellationPolicies()
    {
        return $this->hasMany(Models\TourCancellationPolicy::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourTypes()
    {
        return $this->hasMany(Models\TourType::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Categories that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourCategories()
    {
        return $this->hasMany(Models\TourCategory::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Reservations that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourReservations()
    {
        return $this->hasMany(Models\TourReservation::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Available Dates that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourAvailableDates()
    {
        return $this->hasMany(Models\TourAvailableDate::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Schedules that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourSchedules()
    {
        return $this->hasMany(Models\TourSchedule::class, 'creator_id', 'id');
    }

    /**
     * Getting Locations that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdLocations()
    {
        return $this->hasMany(Models\Location::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Guides that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourGuides()
    {
        return $this->hasMany(Models\TourGuide::class, 'creator_id', 'id');
    }

    /**
     * Getting Medias that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdMedias()
    {
        return $this->hasMany(Models\Media::class, 'creator_id', 'id');
    }

    /**
     * Getting Contacts that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdContacts()
    {
        return $this->hasMany(Models\Contact::class, 'creator_id', 'id');
    }

    /**
     * Getting Qr Codes that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdQrCodes()
    {
        return $this->hasMany(Models\QrCode::class, 'creator_id', 'id');
    }

    /**
     * Getting Translation Languages that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTranslationLanguages()
    {
        return $this->hasMany(Models\TranslationLanguage::class, 'creator_id', 'id');
    }

    /**
     * Getting Custom Field that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdCustomField()
    {
        return $this->hasMany(Models\CustomField::class, 'creator_id', 'id');
    }

    /**
     * Getting Custom Field Values that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdCustomFieldValues()
    {
        return $this->hasMany(Models\CustomFieldValue::class, 'creator_id', 'id');
    }

    /**
     * Getting Dinings that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDinings()
    {
        return $this->hasMany(Models\Dining::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Reservation Requests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningReservationRequests()
    {
        return $this->hasMany(Models\DiningReservationRequest::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Categories that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningCategories()
    {
        return $this->hasMany(Models\DiningCategory::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningTypes()
    {
        return $this->hasMany(Models\DiningType::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Dress Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningDressTypes()
    {
        return $this->hasMany(Models\DiningDressType::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Highlights that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningHighlights()
    {
        return $this->hasMany(Models\DiningHighlight::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Menus that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDiningMenus()
    {
        return $this->hasMany(Models\DiningMenu::class, 'creator_id', 'id');
    }

    /**
     * Getting Dining Allergens that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createDiningAllergens()
    {
        return $this->hasMany(Models\DiningAllergen::class, 'creator_id', 'id');
    }

    /**
     * Getting Vouchers that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdVouchers()
    {
        return $this->hasMany(Models\Voucher::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Providers that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceProviders()
    {
        return $this->hasMany(Models\ServiceProvider::class, 'creator_id', 'id');
    }

    /**
     * Getting Real Estate Properties that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdRealEstateProperties()
    {
        return $this->hasMany(Models\RealEstateProperty::class, 'creator_id', 'id');
    }

    /**
     * Getting Exclusive Deals that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdExclusiveDeals()
    {
        return $this->hasMany(Models\ExclusiveDeal::class, 'creator_id', 'id');
    }

    /**
     * Getting Property Rent Requests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdPropertyRentRequests()
    {
        return $this->hasMany(Models\PropertyRentRequest::class, 'creator_id', 'id');
    }

    /**
     * Getting Property Buy Requests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdPropertyBuyRequests()
    {
        return $this->hasMany(Models\PropertyBuyRequest::class, 'creator_id', 'id');
    }

    /**
     * Getting Property Management Requests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdPropertyManagementRequests()
    {
        return $this->hasMany(Models\PropertyManagementRequest::class, 'creator_id', 'id');
    }

    /**
     * Getting Property Management Packages that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdPropertyManagementPackages()
    {
        return $this->hasMany(Models\PropertyManagementPackage::class, 'creator_id', 'id');
    }

    /**
     * Getting Property Management Services that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdPropertyManagementServices()
    {
        return $this->hasMany(Models\PropertyManagementService::class, 'creator_id', 'id');
    }

    /**
     * Getting Real Estate Property Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdRealEstatePropertyTypes()
    {
        return $this->hasMany(Models\RealEstatePropertyType::class, 'creator_id', 'id');
    }

    /**
     * Getting Real Estate Property Features that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdRealEstatePropertyFeatures()
    {
        return $this->hasMany(Models\RealEstatePropertyFeature::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Main Categories that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceMainCategories()
    {
        return $this->hasMany(Models\ServiceMainCategory::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Sub Categories that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceSubCategories()
    {
        return $this->hasMany(Models\ServiceSubCategory::class, 'creator_id', 'id');
    }

    /**
     * Getting Services that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServices()
    {
        return $this->hasMany(Models\Service::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceTypes()
    {
        return $this->hasMany(Models\ServiceType::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Inclusions that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceInclusions()
    {
        return $this->hasMany(Models\ServiceInclusion::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Requests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServiceRequests()
    {
        return $this->hasMany(Models\ServiceRequest::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Packages that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServicePackages()
    {
        return $this->hasMany(Models\ServicePackage::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Package Types that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServicePackageTypes()
    {
        return $this->hasMany(Models\ServicePackageType::class, 'creator_id', 'id');
    }

    /**
     * Getting Service Package Inclusions that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdServicePackageInclusions()
    {
        return $this->hasMany(Models\ServicePackageInclusion::class, 'creator_id', 'id');
    }

    /**
     * Getting Tour Child Polices that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdTourChildPolicies()
    {
        return $this->hasMany(Models\TourChildPolicy::class, 'creator_id', 'id');
    }

    /**
     * Getting Devices that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdDevices()
    {
        return $this->hasMany(Models\Device::class, 'creator_id', 'id');
    }

    /**
     * Getting Real Estate Property Point of Interests that created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdRealEstatePropertyPointOfInterests()
    {
        return $this->hasMany(Models\RealEstatePropertyPointOfInterest::class, 'creator_id', 'id');
    }
}
