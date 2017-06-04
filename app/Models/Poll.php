<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;


class Poll extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'polls';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------

    */
    public static function recents($number)
    {
        return static::nonExpired()->orderBy('id', 'desc')->take($number)->get();
    }

    public static function ended($number)
    {
        return static::expired()->orderBy('deadline', 'desc')->take($number)->get();
    }

    public static function ownedBy($user, $number)
    {
        return static::query()->where('user_id', '=', $user)->orderBy('id', 'desc')->take($number)->get();
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function options()
    {
        return $this->hasManyThrough(Option::class, Question::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeExpired()
    {
        return static::active()->whereDate('deadline', '<=', Carbon::now());
    }

    public function scopeNonExpired()
    {
        return static::active()->whereDate('deadline', '>', Carbon::now());
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getExpiredAttribute()
    {
        $now = Carbon::now();
        $deadline = Carbon::parse($this->deadline);
        return $now->gt($deadline);
    }

    public function getRouteAttribute()
    {
        return $this->expired
            ? route('result', ['poll' => $this])
            : route('poll', ['poll' => $this]);
    }

    public function getDeadlinePrefixAttribute()
    {
        return $this->expired ? 'Ended' : 'Ends in';
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
