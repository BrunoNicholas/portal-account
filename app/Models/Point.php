<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Point extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'number','user_id','status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'points';

    /*
     * belongs to table
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
