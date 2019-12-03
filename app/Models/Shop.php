<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Image;
use App\User;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'user_id',
        'shop_name',
        'shop_email',
        'shop_telephone',
        'shop_location',
        'shop_gps',
        'shop_website',
        'products_services',
        'accept_cash',
        'accept_bookings',
        'accept_orders',
        'accept_job_applicants',
        'description',
        'categories_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'reviews';

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
     * The relationship method for images
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * The relationship method for images
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
