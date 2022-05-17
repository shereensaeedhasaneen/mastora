<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Loan extends Model
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'loans';
    protected $fillable = [
        'name',
        'national_id',
        'bank_branch_id',
        'country_id',
        'loan_uniqe_id',
        'type',
        'price',
        'payment_period',
        'number_of_installments',
        'depit_value',
        'guarantor',
        'phone_number',
        'land_line_number',
        'number_of_insurance',
        'date_of_birth',
        'social_status',
        'status',
        'number_of_children',
        'have_special_case',
        "applicant_address",
        'description',
        'have_experince',
        'number_of_experice_years',
        'is_owner_project',
        'address_project',
        'guarantor_type',
        'creator_id',
        'last_updater_id',
        'user_id',
        'national_id_front_file',
        'national_id_end_file',
        'home_service_file',
        'rent_file',
        'partner_file',
        'price_file',
        'exeption_period',
        'is_research_done',
        'partner_id',
        'assigned_id',
    ];

    /**
     * Mutate 'date' attribute to carbon instance.
     *
     * @param string|null $value
     * @return void
     */
    public function setDateOfBirthAttribute(?string $value): void
    {
        if (empty($value)) return;
        $this->attributes['date_of_birth'] = Carbon::parse($value);
    }

    public function partner()
    {
        return $this->belongsTo(User::class , 'partner_id');
    }

    /**
     * Getting the user partners that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPartners()
    {
        return $this->hasMany(UserPartener::class, 'loan_id', 'id');
    }

    public function loanStatus()
    {
        return $this->hasMany(LoanUserStatus::class, 'loan_id', 'id');
    }
    
    /**
     * Getting the user partners that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function illnesses()
    {
        return $this->hasMany(Illness::class, 'loan_id', 'id');
    }
    
    /**
     * Getting the user partners that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relative()
    {
        return $this->hasMany(Relative::class, 'loan_id', 'id');
    }
    
    /**
     * Getting the Organization guarantor that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizationGuarantor()
    {
        return $this->hasOne(UserPartener::class, 'loan_id', 'id');
    }

    /**
     * Getting the Organization guarantor that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bank()
    {
        return $this->belongsTo(BankBranch::class, 'bank_branch_id', 'id');
    }
    
    /**
     * Getting the Organization guarantor that are associated with this Loan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function userStatus()
    {
        return $this->belongsToMany( User::class, 'loan_user_statuses' , 'loan_id' , 'user_id');
    }

    public function socialReacerch()
    {
        return $this->hasOne(SocialResearch::class);
    }
    
    public function fieldInquiry()
    {
        return $this->hasOne(FieldInquiry::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function additionalFiles()
    {
        return $this->hasMany(AdditionalFile::class);
    }

    public function assigned()
    {
        return $this->belongsTo(User::class , 'assigned_id');
    }

}
