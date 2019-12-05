<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'rating',
    	'category'
        'user_id',
        'description'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'feedback';
    
    /**
     * Belonds to relationship for users 
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
