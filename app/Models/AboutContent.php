<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'about_id',
        'name',
        'title',
        'description',
    ];

    /**
     * Define the relationship with the About model.
     */
    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
