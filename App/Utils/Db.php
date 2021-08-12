<?php 

class Db{

    private $host="localhost";
    private $username="root";
    private $password="";
    private $db_name="lightfm";
    private $conn="";

    public function __construct(){
            
        $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
            
        if ($this->conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . $this->conn -> connect_error;
                exit();
              }
    }


    public function insert($table_name,$entries=[]){
        $keys=array_keys($entries);
        $values=array_values($entries);
        $values_string="VALUES('".implode("','",$values)."')";
        $keys_string="(".implode(",",$keys).")";
        $query="INSERT INTO `{$this->db_name}`.$table_name $keys_string $values_string";
        if ($this->conn->query($query) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
          }
          
    }

    
}