<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Style;
use App\Models\Salon;
use App\Models\Shop;
use App\User;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'product_id','style_id','shop_id','salon_id',
        'date_time','start_time','end_time',
        'quantity',
        'description',
        'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'orders';

    /*
     * belongs to table
     */
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }

    /*
     * belongs to table
     */
    public function salons()
    {
        return $this->belongsTo(Salon::class);
    }

    /**
     * The relationship method
     *
     * as this table.
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The relationship method
     *
     * as this table.
     */
    public function styles()
    {
        return $this->belongsTo(Style::class);
    }
    
    /**
     * Belonds to relationship for users 
     *
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
     * The relationship method for comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
