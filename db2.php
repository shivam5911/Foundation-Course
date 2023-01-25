<!-- 2. Building basic ORM with core PHP (b) -->
<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   class Db
   {
      // Database connect function 

      private static $sinstance = null;
      private static $conn;
      private function __construct()
      { 
         self::$conn = new mysqli('localhost', 'hestabit', 'hestabit', 'hestabit');
         echo "connected <br>";
      }
      public static function instance()
      {
         if (self :: $sinstance == null) {
            self :: $sinstance = new Db();
            return self::$sinstance;

         } else {
            echo "Already Connected";  
         }
      }

       public static function dbConnect()
      {
         return self :: $conn;
      }
      // Insert data function 

      public function insertData($tableName, $val1, $val2)
      {
         $obj = Db::dbConnect();
         $sql = "insert into {$tableName} (name, age)VALUES ('$val1',$val2)";
         if ($obj->query($sql)) {
            echo "Saved";
         } else {
               echo "Not saved";
          }
      }
       // Show data function 

      public function showData($tableName, $col1, $col2, $id)
      {
         $conn = self :: dbConnect();
         $sql = "SELECT $col1,$col2,$id FROM $tableName";
         $res = $conn->query($sql);
         $respose = $res->fetch_all();
         $row = $res->num_rows;
         echo $row;
         echo "<pre>";
         print_r($respose);
      }
     // Update data function

      public function updateData($tableName, $val1, $val2, $id)
      {
         $conn = $this->dbConnect();
         echo $id;
         $sql = "update  {$tableName} set  name='$val1', age='$val2' where id='$id'";
         if ($conn->query($sql)) {
            echo "Update Sucessfully";
         } else {
            echo "Not Update";
         }
      }
     // Delete data function

       public function deleteData($tableName, $id)
      {
          $conn = $this->dbConnect();

         $sql = "delete from $tableName where id=$id";
         if ($conn->query($sql)) {
            echo "id number is " .$id." Record Deleted";
         } else {
          echo "Not Deteted";
         } 
      }
   }
    $db = Db :: instance();
   $db->insertData('users','Anamika',20);
   //  $db->showData('users','name','age','id');
   //  $db->updateData('users','radha','55','1');
   // $db->deleteData('users', 5);

  