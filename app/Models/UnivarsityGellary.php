<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Univarsity;

class UnivarsityGellary extends Model
{
    protected $fillable = [
        'univarsity_id', 
        'image_path',
    ];


    public function university()
    {
        return $this->belongsTo(Univarsity::class);
    }
}
