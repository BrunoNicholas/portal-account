<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Comment;
use App\User;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'references',
        'title',
        'description',
        'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'posts';

    /**
     * The relationship method for comments.
     *
     * as comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * Belonds to relationship connects both 
     * the user table and the books table
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
}
