<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationLanguage extends Model
{
    use HasFactory;

    protected $table = 'translation_languages';

    protected $primaryKey = 'code';

    protected $fillable = [
        'code',
        'name',
        'creator_id',
        'last_updater_id',
    ];


    /**
     * Getting the user that create this Translation Language.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    /**
     * Getting last user that updated this Translation Language.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastUpdater()
    {
        return $this->belongsTo(User::class, 'last_updater_id', 'id');
    }
}
