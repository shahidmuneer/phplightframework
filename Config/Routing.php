<?php 
define("baseurl",getcwd());

$folders=glob('App/*');

function dd($input){
    echo "<pre>";
    print_r($input);
    echo "</pre>";
    exit;
}
function returnDirectoryAllListings($folders){
    $allFoldersEmpty=false;
    $sub_folders=[];
    foreach($folders as $folder){
        if(!empty(glob($folder."/*"))){
            $sub_folders[$folder]=glob($folder."/*");
        }
    }
    
    // print_r($sub_folders);
    // echo "<br>";
    return empty($sub_folders)?"All Functions called":returnDirectoryAllListings($sub_folders);
}

// echo returnDirectoryAllListings($folders);

spl_autoload_register(function ($class) {
    
    if(file_exists(baseurl.'/App/Controllers/' . $class . '.php')){
        require baseurl.'/App/Controllers/' . $class . '.php';

    }
    elseif(file_exists(baseurl.'/App/Models/' . $class . '.php')){
        require baseurl.'/App/Models/' . $class . '.php';
    }
});

$url=trim(trim($_SERVER["REQUEST_URI"],"/"));
$url_array=explode("lightframework/",$url);
// dd($url_array[1]);
$ControllerAndFunction=explode("/",$url_array[1]);

$class=new $ControllerAndFunction[0];
$class->{$ControllerAndFunction[1]}();



