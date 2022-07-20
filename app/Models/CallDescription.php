<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'call_description';
}
