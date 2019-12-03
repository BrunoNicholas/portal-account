<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Style;
use App\Models\Salon;
use App\Models\Shop;
use App\User;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'style_id','product_id','description','shop_id','quantity',
    	'salon_id','start_time','end_time','user_id','status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'bookings';

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
    public function styles()
    {
        return $this->belongsTo(Style::class);
    }

    /*
     * belongs to table
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
