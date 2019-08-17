<?php

Class Student extends Model
{
	protected $table = 'students';
	
	/*
	* will call the parent class construct method to init db object
	*/
	public function __construct()
	{
		parent::__construct();
	}

}