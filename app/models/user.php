<?php

Class User extends Model
{
	protected $table = 'users';
	
	/*
	* will call the parent class construct method to init db object
	*/
	public function __construct()
	{
		parent::__construct();
	}

	public function login($username,$password){
        $sth = $this->db->prepare("SELECT * FROM $this->table WHERE username = ? and password = ?");
        $sth->execute(array($username,md5($password)));
        $sth->execute();
        $resultSet = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultSet;
    }

}