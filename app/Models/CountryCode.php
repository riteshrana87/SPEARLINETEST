<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_code',
        'country_name',
        'country_prefix',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'country_code';
}
