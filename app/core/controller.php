<?php

class Controller
{

// include model file and return its object
    public function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }
    }

    // include model file and return its object
    public function view($view, $data = array())
    {
        if (file_exists('../app/views/' . $view . '.php')) {

            require_once '../app/views/' . $view . '.php';
        }
    }

    // redirect spcific file
    public function redirect($path)
    {
        $fullPath = HOME . $path;
        header("Location: $fullPath");
    }

    public function back()
    {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

    public function uelGenerate($key)
    {

        if (isset($_GET[$key]) && $_GET[$key] == 'asc')
            echo str_replace("$key=asc", "$key=desc", $_SERVER['REQUEST_URI']);
        else if (isset($_GET[$key]) && $_GET[$key] == 'desc')
            if(count($_GET) == 1){
                echo str_replace("?$key=desc", "", $_SERVER['REQUEST_URI']);
            }else{
                echo str_replace("?$key=desc&", "?", $_SERVER['REQUEST_URI']);
            }

        else if (count($_GET) == 0)
            echo $_SERVER['REQUEST_URI'] . "?$key=asc";
        else{
            if(isset($_GET['page'])){
                echo '//'.$_SERVER['HTTP_HOST']."/public/?$key=asc"."&page=".$_GET['page'];
            }else{
                echo '//'.$_SERVER['HTTP_HOST']."/public/?$key=asc";
            }
        }
    }

}