<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'donor_name',
        'donation_date',
        'blood_group',
        'quantity_ml',
    ];
    public function getFormattedDonationDateAttribute()
    {
        return Carbon::parse($this->attributes['donation_date'])->format('d F Y');
    }
}
