<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'email',
        'email',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'name',
        'rol'
    ];

    /**
     * {@inheritDoc}
     */
    protected $hidden = [
        'password','remember_token',
    ];

    /**
     * {@inheritDoc}
     */
    protected $persistableKey = 'user_id';

    /**
     * {@inheritDoc}
     */
    protected $persistableRelationship = 'persistences';

    /**
     * Array of login column names.
     *
     * @var array
     */
    protected $loginNames = ['email'];

    /**
     * The Eloquent roles model name.
     *
     * @var string
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



}
