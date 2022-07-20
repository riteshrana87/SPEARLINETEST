<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'company_id',
        'test_type_id',
        'name',
        'start_time',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job';

    public function GetjobProcessing(){
        return $this->hasMany(JobProcessing::class,'job_id')->whereNotNull('call_description_id');
    }

    

}
