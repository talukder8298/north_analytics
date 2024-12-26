<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public function contents()
    {
        return $this->hasMany(AboutContent::class, 'about_id');
    }
}
