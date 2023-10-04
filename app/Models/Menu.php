<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'parent_id',
        'status'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
        'deleted_at'
    ];

    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->where('name', 'like', '%'.$key.'%');
    }
}
