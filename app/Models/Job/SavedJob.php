<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    use HasFactory;
    protected $table = 'savedjobs';
    protected $fillable = [
        'id',
        'user_id',
        'job_id',
    ];
    
}
