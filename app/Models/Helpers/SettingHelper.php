<?php

namespace App\Models\Helpers;

trait SettingHelper
{
    /**
     * Get Name that used for Activity Log  Attribute.
     *
     * @return string
     */
    public function getActivityLogNameAttribute()
    {
        return $this->key;
    }
}
