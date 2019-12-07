<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image as GalleryImage;
use App\Models\Company;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Salon;
use App\Models\Style;
use App\User;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'shop_id',
        'salon_id',
        'style_id',
        'product_id',
    	'gallery_name',
    	'description',
    	'gallery_id',
    	'image',
    	'title',
    	'user_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'galleries';

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relationship method for images
     */
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
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
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function styles()
    {
        return $this->belongsTo(Style::class);
    }
}
