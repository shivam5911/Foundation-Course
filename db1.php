<!-- 2. Building basic ORM with core PHP (a) -->
<?php
    interface A{
        public static function dbConnect();
    }
   class Db implements A
   {
      private static $db;
      public static function dbConnect()
      {
        
            self::$db=new mysqli('localhost','hestabit','hestabit','hestabit');
            echo "connected ";
            return self::$db;
            
        
      }
   }

   $obj = Db::dbConnect();

?>