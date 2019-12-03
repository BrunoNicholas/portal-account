<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class JobApplication extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'shop_id','salon_id','job_title','job_description','user_id','expiry_date','status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'job_applications';

    /*
     * belongs to table
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relationship method for comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
