<?php

namespace App\Models;
use App\Models\UnivarsityGellary;

use Illuminate\Database\Eloquent\Model;

class Univarsity extends Model
{
    protected $fillable = [
        'name', 
        'short_name',
        'logo',
        'cover_photo',
        'description',
        'address'
    ];


    public function gallery()
    {
        return $this->hasMany(UnivarsityGellary::class);
    }
}
