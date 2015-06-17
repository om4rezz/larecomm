<?php

class Category extends Eloquent {

	protected $fillable = array('title');

	public static $rules = array('title' => 'required|min:3');
}