<!-- Task 2-->
<!-- Question (5) Create an interface that can be used for calculator functionality. -->

<?php
   interface A
   {
    function addtion(int $a, int $b);
    function sub(int $a, int $b);
    function divide(int $a, int $b);
    function multy(int $a, int $b);

   }
    class main implements A
    {
        public function addtion(int $a, int $b)
        {
            $c=$a+$b;
            echo "Addition = ". $c."<br>";      
        }
        public function sub(int $a, int $b)
        {
            $c=$a-$b;
             echo "Subtraction = ". $c."<br>";   
            
        } 
        public function divide(int $a, int $b)
        {
            $c=$a/$b;
             echo "Divide = ". $c."<br>";   
        }
        public function multy(int $a, int $b)
        {
            $c=$a*$b;
             echo "Multyply = ". $c."<br>";   
        }  
    }

    $obj3 = new Main();
    $obj3->addtion(10,20);
    $obj3->sub(20,10);
    $obj3->divide(20,5);
    $obj3->multy(20,5);

?>