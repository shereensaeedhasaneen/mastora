<?php

namespace App\Services;

use App\Models\FieldInquiry;
use App\Repositories\FieldInquiryRepo;
use App\Services\FieldInquiry\CreationStrategies\Context as CreateContext;
use App\Services\FieldInquiry\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\FieldInquiry\UpdationStrategies\Context as updateContext;
use App\Services\FieldInquiry\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class FieldInquiryService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\FieldInquiryRepo
     */
    protected $repo;

    /**
     * FieldInquiryService constructor.
     *
     * @param  \App\Repositories\FieldInquiryRepo  $repo
     */
    public function __construct(FieldInquiryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $costData
     * @return \App\Models\FieldInquiry
     */
    public function makeResourceWebBased(array $costData): FieldInquiry
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $FieldInquiry = $context->createFieldInquiry($costData);
        return $FieldInquiry;
    }

    /**
     * Update resource web based.
     * 
     * @param array $costData
     * @param \App\Models\FieldInquiry $FieldInquiry
     * @return \App\Models\FieldInquiry
     */
    public function updateResourceWebBased(array $costData, FieldInquiry $cost): FieldInquiry
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedFieldInquiry = $context->updateFieldInquiry($costData, $cost);
        return $updatedFieldInquiry;
    }
}
