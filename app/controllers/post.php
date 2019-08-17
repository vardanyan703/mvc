<?php
class post extends Controller
{
    protected $task;

	public function __construct()
	{
        $this->task = $this->model('task');
	}

	public function add()
	{
        $this->view('layout/header');
        $this->view('post');
        $this->view('layout/footer');
	}

	public function __postStore(){
        if($this->task->store($_POST['username'],$_POST['email'],$_POST['text'])){
            return $this->redirect('/public');
        }

    }

    public function __postStatus(){
        $this->task->update($_POST['id'],[
           'status' => $_POST['status']
        ]);
        return true;
    }

    public function __postEdit(){
        $this->task->update($_POST['id'],[
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'text' => $_POST['text']
        ]);
        return $this->back();
    }
}