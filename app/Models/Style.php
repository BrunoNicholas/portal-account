<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Salon;
use App\User;

class Style extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'salon_id',
        'style_id',
        'user_id',
        'style_name',
        'description',
        'previous_price',
        'current_price',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'styles';

    /*
     * belongs to table
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /*
     * belongs to table
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    /*
     * belongs to table
     */
    public function salons()
    {
        return $this->belongsTo(Salon::class);
    }

    /**
     * The relationship method for.
     * as this table.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * The relationship method for comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The relationship method for images
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
