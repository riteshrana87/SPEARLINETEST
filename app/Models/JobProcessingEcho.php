<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProcessingEcho extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_type_id',
        'job_id',
        'number_id',
        'call_start_time',
        'call_connect_time',
        'call_end_time',
        'call_description_id',
        'created_on',
        'updated_on ',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_processing_echo';
}
