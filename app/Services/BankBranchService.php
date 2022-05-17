<?php

namespace App\Services;

use App\Models\BankBranch;
use App\Repositories\BankBranchRepo;
use App\Services\BankBranch\CreationStrategies\Context as CreateContext;
use App\Services\BankBranch\CreationStrategies\WebBasedStrategy as CreateWebBasedStrategy;
use App\Services\BankBranch\UpdationStrategies\Context as updateContext;
use App\Services\BankBranch\UpdationStrategies\WebBasedStrategy as updateWebBasedStrategy;

class BankBranchService extends AbstractService
{
    /**
     * Product Category repo
     *
     * @var \App\Repositories\BankBranchRepo
     */
    protected $repo;

    /**
     * BankBranchService constructor.
     *
     * @param  \App\Repositories\BankBranchRepo  $repo
     */
    public function __construct(BankBranchRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Make resource web based.
     * 
     * @param array $productCategoryData
     * @return \App\Models\BankBranch
     */
    public function makeResourceWebBased(array $productCategoryData): BankBranch
    {
        $context = resolve(CreateContext::class);
        $webBasedStrategy = resolve(CreateWebBasedStrategy::class);
        $context->setCreateStrategy($webBasedStrategy);
        $BankBranch = $context->createBankBranch($productCategoryData);
        return $BankBranch;
    }

    /**
     * Update resource web based.
     * 
     * @param array $productCategoryData
     * @param \App\Models\BankBranch $BankBranch
     * @return \App\Models\BankBranch
     */
    public function updateResourceWebBased(array $productCategoryData, BankBranch $productCategory): BankBranch
    {
        $context = resolve(updateContext::class);
        $webBasedStrategy = resolve(updateWebBasedStrategy::class);
        $context->setUpdateStrategy($webBasedStrategy);
        $updatedBankBranch = $context->updateBankBranch($productCategoryData, $productCategory);
        return $updatedBankBranch;
    }
}
