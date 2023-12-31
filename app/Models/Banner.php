<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'path_link',
        'description',
        'path_image',
        'status',
    ];

    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->where('name', 'like', '%'.$key.'%');
    }
}
