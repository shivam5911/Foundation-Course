<!-- 2. Building basic ORM with core PHP (b) -->
<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   class Db
   {
      // Database connect function 

      private static $db;
      public static function dbConnect()
      {
         self::$db = new mysqli('localhost', 'hestabit', 'hestabit', 'hestabit');
         return self::$db;
      }
      // Insert data function 

      public function insertData($tableName, $val1, $val2)
      {
         $conn = $this->dbConnect();
         $sql = "insert into {$tableName} (name, age)VALUES ('$val1',$val2)";
         if ($conn->query($sql)) {
            echo "Saved";
         } else {
            echo "Not saved";
         }
      }
      // Show data function 

      public function showData($tableName, $col1, $col2, $id)
      {
         $conn = $this->dbConnect();
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
         echo $id;

         $sql = "delete from $tableName where id=$id";
         if ($conn->query($sql)) {
            echo "Record Deleted";
         } else {
            echo "Not Deteted";
         }
      }
   }
   $obj = new db();
   $con = $obj->dbConnect();
   //$obj->insertData('users','Anamika',20);
   //$obj->showData('users','name','age','id');
   //$obj->updateData('users','radha','55','1');
   //$obj->deleteData('users', 3);

   if (isset($_POST['ch'])) {
      $val = $_POST['val'];
      switch ($val) {
         case 1:
            $obj->insertData('users', 'Anamika', 20);
            break;
         case 2:
            $obj->showData('users','name','age','id');
            break;
         case 3:
            $obj->updateData('users','radha','55','1');
            break;
         case 4:
            $obj->deleteData('users', 3);
            break;
         default :
            echo "Wrong choice";
      }
   }
?>
<html>
<body>
   <ol>
      <li>Insert</li>
      <li>Show</li>
      <li>Update</li>
      <li>Delete</li>
   </ol>
   <h3>Enter Your Choice...</h3>
   <form action="" method="post">

      <input type="text" name="val" placeholder="Enter Only digit">
      <input type="submit" value="choice" name="ch">
      </form>
</body>

</html>