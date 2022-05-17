<?php

namespace App\Services\SocialResearch\UpdationStrategies;

use App\Models\SocialResearch;
use App\Services\SocialResearchService;

class WebBasedStrategy implements UpdateStrategyInterface
{

    /**
     * Implementing the updation of a product category.
     *
     * @param array $socialResearchData
     * @param \App\Models\SocialResearch $socialResearch
     * @return \App\Models\SocialResearch
     */
    public function update(array $socialResearchData, SocialResearch $socialResearch): SocialResearch
    {
        $authenticatedUserId = auth()->id();
        $socialResearchData['last_updater_id'] = $authenticatedUserId;

        $socialResearchWithWrappedTranslation = fillingTranslation($socialResearchData);

        $socialResearch = $this->updateSocialResearch($socialResearchWithWrappedTranslation, $socialResearch);


        return $socialResearch;
    }

    /**
     * Update product category.
     *
     * @param array $socialResearchWithWrappedTranslation
     * @return \App\Models\SocialResearch
     */
    private function updateSocialResearch(array $socialResearchWithWrappedTranslation, SocialResearch $socialResearch): SocialResearch
    {
        $socialResearchService = resolve(SocialResearchService::class);
        $translationCode = $socialResearchWithWrappedTranslation['translation_language'];
        if (!isDefaultLanguage($translationCode)) {
            return $this->updateSocialResearchTranslation($socialResearchWithWrappedTranslation, $socialResearch);
        }
        $updatedSocialResearch = $socialResearchService->updateResource($socialResearchWithWrappedTranslation, $socialResearch);
        return $updatedSocialResearch;
    }

    /**
     * Update a product category translations which is not the default ones.
     *
     * @param array $socialResearchWithWrappedTranslation
     * @param \App\Models\SocialResearch $socialResearch
     * @return \App\Models\SocialResearch
     */
    private function updateSocialResearchTranslation(array $socialResearchWithWrappedTranslation, SocialResearch $socialResearch): SocialResearch
    {
        $translationCode = $socialResearchWithWrappedTranslation['translation_language'];
        $translatableAttributes = $socialResearchWithWrappedTranslation['filling_translation'];
        foreach ($socialResearch->translatedAttributes as $attribute) {
            $socialResearch
                ->translateOrNew($translationCode)
                ->{$attribute} = $translatableAttributes[$translationCode][$attribute];
        }
        $socialResearch->save();
        return $socialResearch;
    }

    
}
