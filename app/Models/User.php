<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Presenter\UserPresenter;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Relationships\User\CreatedEntities;
use App\Models\Relationships\User\LastUpdatedEntities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements
    HasMedia,
    JWTSubject
{
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use LogsActivity;
    use InteractsWithMedia;
    use CreatedEntities;
    use LastUpdatedEntities;
    use PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'bank_branch_id',
        'password',
        'creator_id',
        'last_updater_id',
        'account_token',
    ];

    protected $presenter = UserPresenter::class;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    */

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function lastUpdater()
    {
        return $this->belongsTo(User::class, 'last_updater_id', 'id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function loanStatus()
    {
        return $this->belongsToMany( Loan::class, 'loan_user_statuses' , 'user_id' , 'loan_id');
    }

    public function bank()
    {
        return $this->belongsTo(BankBranch::class , 'bank_branch_id' , 'id');
    }

    public function assignedLoan()
    {
        return $this->hasMany(Loan::class , 'assigned_id');
    }
}
