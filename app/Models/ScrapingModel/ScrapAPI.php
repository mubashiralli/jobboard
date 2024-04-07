<?php

namespace App\Models\ScrapingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapAPI extends Model
{
    use HasFactory;
    protected $table = 'databaseapi';
    protected $fillable = [
        'id',
        'source',
        'name',
        'description',
        'currency',
        'price',
        'status',
        'updated_at',
        'images',
        'url',
    ];
    public $timestamps = true;
}
