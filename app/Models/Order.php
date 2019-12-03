<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Comment;
use App\User;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'orders';

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
