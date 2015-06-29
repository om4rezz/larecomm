<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('first_name', 'last_name', 'email', 'telephone');

    public static $rules = array(
        'first_name' => 'required|min:2|alpha',
        'last_name' => 'required|min:2|alpha',
        'email' => 'required|email|unique:users',
        'password' => 'required|alpha_num|between:8,12|confirmed',
        'password_confirmation' => 'required|alpha_num|between:8,12',
        'telephone' => 'required|between:10,16',
        'admin' => 'integer'
    );

}
