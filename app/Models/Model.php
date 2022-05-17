<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Model extends BaseModel
{
    use LogsActivity;

    /**
     * Relation by language.
     *
     * @param string|null $language
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language($language = null)
    {
        // Force to fetch the selected language [OR] Get the current request language
        return $this->languages()->whereLangCode($language ?: \App::getLocale());
    }

    /**
     * Relation to all languages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(static::class.config('repo.translation.model_key_name'));
    }

    /**
     * Get language with current localization [OR] Fallback value of each field
     *
     * @return $this
     */
    public function lang()
    {
        $objects = $this->{config('repo.translation.localizations_relation')};
        $fallbackLocale = $this->{config('repo.translation.local_field_key')};
        $groupObjects = $objects->groupBy(config('repo.translation.local_field_key'));

        // Check if entity has only one locale return entity with fallback language that was created with it
        if ($groupObjects->count() == 1 || ! isset($groupObjects[\App::getLocale()])) {
            return optional(optional($groupObjects[$fallbackLocale] ?? null)->first());
        }

        // Get entity attributes with request locale if isset otherwise get attribute fallback locale
        $localeObject = $groupObjects[\App::getLocale()]->first();

        foreach ($objects->first()->attributes as $key => $value) {
            if (! isset($localeObject->{$key}) || (string) $localeObject->{$key} === '') {
                $localeObject->attributes[$key] = $groupObjects[$fallbackLocale]->first()->attributes[$key];
            }
        }

        return $localeObject;
    }

    /**
     * Get Name that used for Activity Log  Attribute.
     *
     * @return string
     */
    public function getActivityLogNameAttribute()
    {
        return  $this->attributes['name'] ?? $this->id;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
