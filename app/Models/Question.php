<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\User;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic',
        'description',
        'user_id',
        'responder',
        'response',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'questions';

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
}
