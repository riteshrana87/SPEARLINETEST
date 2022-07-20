<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'number',
        'country_code_id',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'number';

    public function getCountry(){
        return $this->hasOne(CountryCode::class,'id','country_code_id');
    }

    public function getCompany(){
        return $this->hasOne(Company::class,'id','company_id');
    }


}
