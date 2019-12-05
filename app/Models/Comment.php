<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;
use App\Models\Question;
use App\Models\Company;
use App\Models\Product;
use App\Models\Order;
use App\Models\Style;
use App\Models\Post;
use App\User;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'question_id',
        'user_id',
        'comment',
        'order_id',
        'company_id',
        'job_application_id',
        'style_id',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'comments';

    /**
     * Belonds to relationship connects both
     * the comment to this table
     *
     */
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to e parent post, sermon 
     *
     */
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to e parent post, sermon 
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
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to this table
     */
    public function job_applications()
    {
        return $this->belongsTo(JobApplication::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to this table
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to this table
     */
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Belonds to relationship connects both
     * the comment to this table
     */
    public function styles()
    {
        return $this->belongsTo(Style::class);
    }
}
