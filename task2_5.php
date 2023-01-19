<!-- Task 2-->
<!-- Question (5) Create an interface that can be used for calculator functionality. -->

<?php
   interface A
   {
    function addtion(int $a, int $b);
    function subtraction(int $a, int $b);
    function divide(int $a, int $b);
    function multyply(int $a, int $b);

   }
    class main implements A
    {
        public function addtion(int $a, int $b)
        {
            $c=$a+$b;
            echo "Addition = ". $c."<br>";      
        }
        public function subtraction(int $a, int $b)
        {
            $c=$a-$b;
             echo "Subtraction = ". $c."<br>";   
            
        } 
        public function divide(int $a, int $b)
        {
            $c=$a/$b;
             echo "Divide = ". $c."<br>";   
        }
        public function multyply(int $a, int $b)
        {
            $c=$a*$b;
             echo "Multyply = ". $c."<br>";   
        }  
    }

    $obj3 = new Main();
    $obj3->addtion(10,20);
    $obj3->subtraction(20,10);
    $obj3->divide(20,5);
    $obj3->multyply(20,5);

?>