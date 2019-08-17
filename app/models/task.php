<?php

Class Task extends Model
{
	protected $table = 'tasks';
	
	/*
	* will call the parent class construct method to init db object
	*/
	public function __construct()
	{
		parent::__construct();

	}

	public function store($username,$email,$text){
        $sth = $this->db->prepare("INSERT INTO `$this->table` (`name`, `email`, `text`, `status`) VALUES (?,?,?,?)");
        $sth->execute(array($username,$email,$text,0));
        return true;
    }

    public function paginate(){
        try {
            $page = 1;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            if($page < 1)
                $page = 1;

            $limit = $page * 3 - 3;
            if(isset($_GET['name']) || isset($_GET['status']) || isset($_GET['text'])){
                foreach ($_GET as $key => $value){
                    $query = "SELECT * FROM $this->table order by `".$key."` ".$value."  limit $limit,3";
                    break;
                }
            }else{
                $query = "SELECT * FROM $this->table order by `id` desc  limit $limit,3";
            }
            $sth = $this->db->prepare($query);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e)
        {
            return array();
        }
    }

}