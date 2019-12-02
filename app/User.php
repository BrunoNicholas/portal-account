<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Image;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Post;
use App\Models\Question;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Salon;
use App\Models\Shop;
use App\Models\Team;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_notifications', 'role', 
        'profile_image', 'gender', 'date_of_birth', 'telephone', 'nationality', 
        'occupation', 'place_of_work', 'work_address', 'home_address', 'bio', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static function boot() {
    //     parent::boot();

    //     static::roleAttached(function($user, $role, $team) {
    //         // 
    //     });
        
    //     static::roleSynced(function($user, $changes, $team) {
    //         // 
    //     });
    // }



    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function salons()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    /**
     * The relationship method for galleries.
     *
     * as galleries.
     */
    public function teams()
    {
        return $this->hasMany(Order::class);
    }
}
