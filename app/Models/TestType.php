<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_type',
        'description',
        'job_processing_table',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_type';
}
