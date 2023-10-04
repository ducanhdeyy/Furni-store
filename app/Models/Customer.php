<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'path_image',
        'address',
    ];

    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->orWhere('name', 'like', '%'.$key.'%')->orWhere('email', 'like', '%'.$key.'%');
    }
}
