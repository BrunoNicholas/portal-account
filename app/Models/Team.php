<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TeamUser;
use App\User;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_name',
        'user_id',
        'team_id',
        'team_description',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'teams';

    /**
     * Belonds to relationship for users
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relationship method for comments.
     *
     * as comments.
     */
    public function team_users()
    {
        return $this->hasMany(TeamUser::class);
    }
}
