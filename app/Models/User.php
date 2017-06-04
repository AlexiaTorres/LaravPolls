<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'email', 'token', 'nickname', 'avatar'];

    public function findByEmail($email)
    {
        return $this->query()->where('email', $email)->first();
    }

    public function findOrCreateSocial($data, $provider)
    {
        // User email may not provided.
        $user_email = $data->email ?: "{$data->id}@{$provider}.com";

        // Check to see if there is a user with this email first.
        $user = $this->findByEmail($user_email);

        /*
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if ( ! $user) {
            $user = $this->create([
                'name'  => $data->name,
                'email' => $user_email,
                'nickname' => $data->nickname,
                'avatar' => $data->avatar
            ], true);
        }

        // Return the user object
        return $user;
    }

    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class)->withTimestamps();
    }

    public function getAvatarOrDefaultAttribute()
    {
        return $this->avatar
            ? $this->avatar
            : "/img/kola-profile.png";
    }

    public function getNicknameOrEmailAttribute()
    {
        return $this->nickname
            ? $this->nickname
            : $this->email;
    }
}
