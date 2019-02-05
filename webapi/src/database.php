<?php
class Database{
 
    // specify your own database credentials
    private $host = "127.0.0.1";
    private $db_name = "_store";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
    
    public function prepareSQL($sqlFile) {
        $command = "mysql --user={$vals[$username]} --password='{$vals[$password]}' ". "-h {$vals[$host]} -D {$vals[$db_name]} < {$script_path}";
        $output = shell_exec($command . $sqlFile);
        return 0;
    }
}
?>