<?php

namespace App\Services\BankBranch\UpdationStrategies;

use App\Models\BankBranch;
use App\Services\BankBranchService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $cityData
     * @param \App\Models\BankBranch $city
     * @return \App\Models\BankBranch
     */
    public function update(array $cityData, BankBranch $city): BankBranch
    {
        $authenticatedUserId = auth()->id();
        $cityData['last_updater_id'] = $authenticatedUserId;

        $cityWithWrappedTranslation = fillingTranslation($cityData);

        $city = $this->updateBankBranch($cityWithWrappedTranslation, $city);


        return $city;
    }

    /**
     * Update product category.
     *
     * @param array $cityWithWrappedTranslation
     * @return \App\Models\BankBranch
     */
    private function updateBankBranch(array $cityWithWrappedTranslation, BankBranch $city): BankBranch
    {
        $cityService = resolve(BankBranchService::class);
        $translationCode = $cityWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateBankBranchTranslation($cityWithWrappedTranslation, $city);
        }
        $updatedBankBranch = $cityService->updateResource($cityWithWrappedTranslation, $city);
        return $updatedBankBranch;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $cityWithWrappedTranslation
     * @param \App\Models\BankBranch $city
     * @return \App\Models\BankBranch
     */
    private function updateBankBranchTranslation(array $cityWithWrappedTranslation, BankBranch $city): BankBranch
    {
        $translationCode = $cityWithWrappedTranslation['translation_language'];
        $translatableAttributes = $cityWithWrappedTranslation['filling_translation'];
        foreach ($city->translatedAttributes as $attribute) {
            $city
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $city->save();
        return $city;
    }

    
}
