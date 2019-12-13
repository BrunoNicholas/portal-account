<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Image;
use App\Models\Shop;
use App\User;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'shop_id','product_name','product_id','description','previous_price',
    	'current_price','categories_id','user_id','status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'products';

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
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }

    /*
     * has many images
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /*
     * belongs to table
     */
    public function users()
    {
        return $this->belongsTo(User::class);
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
     * The relationship method for.
     * as this table.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The relationship method for comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
