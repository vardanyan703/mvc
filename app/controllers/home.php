<?php
class home extends Controller
{
    protected $user;
    protected $tasks;

	public function __construct()
	{
        $this->user = $this->model('user');
        $this->tasks = $this->model('task');
	}

	public function index ()
	{
	    $posts = $this->tasks->paginate();
	    $paginate = $this->tasks->count();
	    $paginate = ceil($paginate / 3);

        $this->view('layout/header');
        $this->view('home',[
            'posts' => $posts,
            'page_count' => $paginate
        ]);
        $this->view('layout/footer');
	}

	public function login(){
        $this->view('layout/header');
        $this->view('login');
        $this->view('layout/footer');

    }

    public function signin(){
	    if(!isset($_POST['login'])) die();
	    $username = $_POST['login'];
	    $password = $_POST['password'];
	    if(count($this->user->login($username,$password)) > 0){
            Session::set('loggin',true);
            // if matches username and password redirect to index
            $this->redirect('/public');
        }else{
            Session::set('login_error',true);
            $this->redirect('/public/home/login');
        }

    }
    public function logout(){
	    Session::remove('loggin');
	    $this->redirect('/public');
    }
}