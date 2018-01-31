<?php

namespace App;

use Cartalyst\Sentinel\Permissions\PermissibleInterface;
use Cartalyst\Sentinel\Permissions\PermissibleTrait;
use Cartalyst\Sentinel\Roles\RoleableInterface;
use Cartalyst\Sentinel\Roles\RoleInterface;
use Illuminate\Database\Eloquent\Model;

class Role extends Model implements RoleInterface,PermissibleInterface
{

    use PermissibleTrait;
    protected $table='roles';


}
