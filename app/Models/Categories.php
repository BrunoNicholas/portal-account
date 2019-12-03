<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Order;
use App\Models\Style;
use App\Models\Salon;
use App\Models\Post;
use App\Models\Shop;
use App\User;

class Categories extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name','display_name','description',
    	'categories_id','user_id','type'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'categories';

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
    public function companies()
    {
    	return $this->hasMany(Company::class);
    }

    /*
	 * Has many relationship to table
     */
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }

    /*
	 * Has many relationship to table
     */
    public function posts()
    {
    	return $this->hasMany(Post::class);
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
    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }

    /*
	 * Has many relationship to table
     */
    public function styles()
    {
    	return $this->hasMany(Style::class);
    }
}
