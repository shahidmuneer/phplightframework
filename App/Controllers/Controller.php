<?php 

class Controller{

    public function __construct(){

    }

    public function index(){
        $db=new Db();
        $db->insert("shahid",[
            "education"=>"Nothing",
            "study"=>"Current",
            "name"=>"shahid"
        ]);
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