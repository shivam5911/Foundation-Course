<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    class Database
    {
        private $hostname = "localhost";
        private $username = "hestabit";
        private $password = "hestabit";
        private $dbname = "collage"; 

        private $conn = false;
        private $connection = NULL;
        private $result = array();

        public function __construct()
        {
            if(!$this->conn){
                $this->connection = new  mysqli($this->hostname, $this->username, $this->password, $this->dbname);
                if($this->connection->connect_error){
                    array_push($this->result, $this->connection->connect_error);
                    return false;
                }
            }else{
                return true;
            }
        }

        public function  __destruct()
        {
            if(!$this->conn){
                if($this->connection->close()){
                    $this->conn = false;
                }
            }else{
                return false;
            }
        }

        // Insert function into database

        public function insertData($table, $data = array())
        {
            if($this->checkTable($table)){
                // print_r($data);
                $column = implode(',', array_keys($data));
                $value = implode("','", $data);
                $sql="INSERT INTO $table ($column) VALUES ('$value')";
                if($this->connection->query($sql)){
                    echo "Data Saved ";
                    array_push($this->result, $this->connection->insert_id);
                }else{
                    array_push($this->result, $this->connection->error);
                    return false;
                }
            }
        }

        // Check table  function into database
        private function checkTable($table)
        {
            $sql="SHOW TABLES FROM $this->dbname LIKE '$table'";
            $tableInDb=$this->connection->query($sql);
            if($tableInDb){
                if($tableInDb->num_rows==1)
                return true;
            }else{
                array_push($this->result, $table."Not exits in database");
                return false;
            }
        }

       // getResult function 
        public function getResult()
        {
            $val = $this->result;
            print_r($val);
            $this->result = array();
        }

        // Update function into database
        public function updateData($table, $data = array(), $id=null)
        {
            if($this->checkTable($table)){
                $args = array();
                foreach($data as $key => $value){
                    $args[] = "$key = '$value'";
                }
                $sql="UPDATE $table SET ".implode(',', $args);
                if($id != null){
                    $sql .= " where $id";
                    if($this->connection->query($sql)){
                        array_push($this->result,$this->connection->affected_rows);
                    }else{
                        array_push($this->result, $this->connection->error);
                    }
                }
            }else{
                array_push($this->result,$table."is not exits in database");
            }
        }

        //Delete function in database
        public function deleteData($table, $id=null)
        {
            if($this->checkTable($table)){
                $sql="DELETE FROM $table ";
                if($id !=null){
                    $sql.="WHERE $id";
                   if($this->connection->query($sql)){
                        array_push($this->result, $this->connection->affected_rows);
                   }
                }
            }else{
                array_push($this->result,  $table."Not exits in Database");
            }
        }

        // Show data into database
        public function showData($q)
        {
            $sql=$this->connection->query($q);
            if($sql){
                $this->result = $sql->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                array_push($this->result, $this->connection->error);
                return false;

            }
            
        }


    }


    $obj = new Database();
    // $obj->insertData('student', ['name'=>'Aman', 'course'=>'php', 'mobile'=>'315363663']);

    // $obj->updateData('student', ['name'=>'shivam', 'course'=>'java', 'mobile'=>'315363663'],'id="2"');
    // $obj->deleteData('student', 'id="3"');
    $obj->showData("SELECT * FROM student ");

    $obj->getResult();
    
