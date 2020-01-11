<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Salon;
use App\Models\Shop;
use App\User;

class TeamUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'user_id',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'teams';

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function teams()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function salons()
    {
        return $this->belongsTo(Salon::class);
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

