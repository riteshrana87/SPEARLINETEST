<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JobProcessing extends Model
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
        'updated_on',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_processing';

    public function getJob(){
        return $this->hasOne(Job::class,'id','job_id');
    }

    public function getNumber(){
        return $this->hasOne(Number::class,'id','number_id');
    }

    public function getEcho(){
        return $this->hasMany(JobProcessingEcho::class,'job_id');
    }

    public function getFailer(){
        return $this->hasMany(JobProcessingFailover::class,'job_id');
    }
    


}
