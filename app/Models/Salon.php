<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Gallery;
use App\Models\Style;
use App\User;

class Salon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'categories_id',
    	'company_id',
    	'salon_name',
    	'salon_email',
    	'salon_telephone',
        'salon_website',
        'salon_category',
        'salon_location',
        'salon_gps',
        'accept_cash',
        'accept_bookings',
        'accept_orders',
        'accept_job_applicants',
        'description',
        'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'salons';

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

    /**
     * The relationship method for.
     * as this table.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * The relationship method for galleries
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * The relationship method
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * The relationship method
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The relationship method for.
     * as this table.
     */
    public function styles()
    {
        return $this->hasMany(Style::class);
    }
}
