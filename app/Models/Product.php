<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'price',
        'image_path',  // Make sure to include all attributes you want to be mass assignable
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
