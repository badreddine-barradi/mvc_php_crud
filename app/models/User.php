<?php

/**
 * Created by PhpStorm.
 * User: pc
 * Date: 11/07/2017
 * Time: 14:41
 */

use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{
    public $name;
    //public $timestamps = false;
    protected $fillable = ['username' , 'email'];

}