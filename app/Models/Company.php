<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Salon;
use App\Models\Gallery;
use App\Models\Shop;
use App\User;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'user_id',
        'company_name',
        'company_email',
        'company_logo',
        'company_telephone',
        'company_location',
        'products_services',
        'description',
        'company_ID',
        'company_gps',
        'company_website',
        'company_bio',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'companies';

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
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /*
     * Has many relationship to table
     */
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    /*
     * Has many relationship to table
     */
    public function salons()
    {
        return $this->hasMany(Salon::class);
    }

    /*
     * Has many relationship to table
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /*
	 * Has many relationship to table
     */
    public function ratings()
    {
    	return $this->hasMany(Rating::class);
    }

    /*
	 * Has many relationship to table
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
