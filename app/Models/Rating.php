<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Salon;
use App\Models\Shop;
use App\User;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'salon_id',
        'shop_id',
        'rate_number',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'ratings';

    /*
	 * belongs to table
     */
    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    /*
	 * belongs to table
     */
    public function companies()
    {
    	return $this->belongsTo(Company::class);
    }

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
}
