<?php
class Mydb{
    private $server_name;
    private $username;
    private $password;
    private $database;
    private $conn;
    private $table_name; 
    public function createdb(){
        $sql = "CREATE DATABASE IF NOT EXISTS ".$this->database."";
        if(mysqli_query($this->conn,$sql)){
            $this->conn = mysqli_connect($this->server_name,$this->username,$this->password,$this->database);
            return 200;
        }
        else{
            error_log(mysqli_error($this->conn));
            return ["error"=>mysqli_error($this->conn)];
        }
    }
    public function __construct(){
        $this->server_name = "127.0.0.1";
        $this->username = "root";
        $this->password = "";
        $this->database = "assignment_db1";
        $this->table_name = "account";
        $this->conn = mysqli_connect($this->server_name,$this->username,$this->password);
        $this->createdb();
        $this->createTable();
    }
    public function createTable(){
        $sql = "CREATE TABLE IF NOT EXISTS ".$this->table_name."(
            full_name varchar(30) NOT NULL,
            user_name varchar(30) NOT NULL PRIMARY KEY,
            email varchar(50) NOT NULL,
            password varchar(255) NOT NULL,
            phone  varchar(30) NOT NULL,
            address varchar(100) NOT NULL,
            image_url varchar(255),
            whatsapp varchar(30) NOT NULL
        )";
        if(mysqli_query($this->conn,$sql)){
            return 200;
        }
        else{
            error_log(mysqli_error($this->conn));
            return ["error"=>mysqli_error($this->conn)];
        }
    }
    
    public function __destruct(){
        mysqli_close($this->conn);
    }
    public function insert($full_name,$user_name,$email,$password,$phone,$address,$image_url,$whatsapp){
      
        $sql_insert = "INSERT INTO ".$this->table_name."(full_name,user_name,phone,whatsapp,address,password,image_url,email) VALUES ('".$full_name."','".$user_name."','".$phone."','".$whatsapp."','".$address."','".$password."','".$image_url."','".$email."')";
        try{        
        if(mysqli_query($this->conn,$sql_insert)){

                    return [
                        "state"=>"success",
                        'message'=>"The Account Has Been Created Successfully"
                    ];
                }
                else{
                    return  [
                        "state"=>"error",
                        'message'=>"This Username Is In Used",
                    ];
                }
            } catch(Exception $e){
                return  [
                    "state"=>"error",
                    'message'=>"This Username Is In Used",
                ];
            }
       
    }
    public function select($user_name){
        $sql_select = "SELECT * FROM ".$this->table_name." WHERE user_name ="." '".$user_name."'";
        $result = mysqli_query($this->conn,$sql_select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            
            return json_encode([
                "data"=>$row                
            ]);
        }
        else{
            error_log("data not found");
            return json_encode(["error"=> "data not found"]);
        }
    }
}

$mynewdb = new Mydb();
// $mynewdb->insert("ali","1234150","ali@test.com","123.874",201142420289,"dsadas","sadasd",201142420289);
// $user =$mynewdb->select("1234150");
// echo $user['full_name'];
include "Upload.php";

header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $address = $_POST['address'];
    $photo_response = saveUploadedImage('photo'); 
    if ($photo_response['state']){
        $db_response = $mynewdb->insert($full_name,$username,$email,$password,$phone,$address,$photo_response['path'],$whatsapp_number);
        if ($db_response['state']=="error"){
            deleteUploadedImage($photo_response['basename']);
        }
        echo json_encode(
            [
                 'state'=>$db_response['state'],
                 "message"=> $db_response['message']
            ]);

    } else{
        echo json_encode([
            'state' => 'failed',
            "message" => $photo_response["error"]
        ]);

    }
   


    
    
}
?>

