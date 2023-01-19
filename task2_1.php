<!-- Task 2 -->

<?php
   //Question (1) Create a basic calculator with the only Add and Subtract functionality.

    class Calc
    {
        public function addtion(int $a, int $b)
        {
           $c=$a+$b;
           echo "Addition = ". $c."<br>";           
        }
        public function subtaction(int $a, int $b)
        {
            return $c=$a-$b;
            
        }
    }
  // create object class of Calc

    // $c=new Calc();
    // $c->addtion(10,20);
    // echo "Subtraction = ". $c->subtraction(20,10)."<br>";

    // ----------------------------------------------------------------------------------------
    //Question (2) Create a function of Divide using Trait.

    trait Divide
    {
        public function divide(int $a, int $b)
        {
            $c=$a/$b;
            echo "Divide =".$c."<br>";
        }
    }
    class A extends Calc
    {
        use Divide;
    }
    // create object class of A

    // $ob = new A();
    // $ob->divide(20,5);
    
// ----------------------------------------------------------------------------------------------
    /*Question (3) Create a calculator with the only Add, Multiply & Divide functionality by using
    the inheritance and using Trait.*/
    
    class Calculator extends A
    {
        use Divide;
        public function multiply(int $a, int $b)
        {
            $c=$a*$b;
            echo "Multiply = ".$c."<br>";
        }
    }
     // create object class of Calculator 

    // $ob1 = new Calculator();
    // $ob1->multiply(10,20);
    // $ob1->addtion(10,20);
    // $ob1->divide(10,20);

    // ------------------------------------------------------------------------------------------
   
    /*Question (4) Create a complete calculator with Add, Subtract, Multiply, and Divide
     functionality using the inheritance.*/

     class complateCalculator extends Calculator
    {
        public function __construct()
        {
            echo"Complate Calculator .<br>";
        }
    }

    // create object class of complateCalculator 

    $ob2 =new complateCalculator();
    $ob2->addtion(20,30);
    $ob2->divide(20,4);
    $ob2->multiply(20,30);
?> 