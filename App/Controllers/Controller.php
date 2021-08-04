<?php 

class Controller{

    public function __construct(){

    }

    public function index(){
        $user=new Users();
        $users=$user->getUser();
        $this->loadView("home",$users);
    }

    public function zip(){
        echo "you are in zip";
    }

    public function loadView($name,$data){
        require(baseurl."/Views/".$name.".php");
    }
}