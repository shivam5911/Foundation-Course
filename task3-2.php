<!-- Task 3 -->
<!-- split String into array  -->
<?php
namespace Test2
{
    class StringMagic
    {
        public function splitString($s)
        {
         $str=explode(",",$s);
         print_r($str);
        }
    }
}


// $obj= new StringMagic();
// $obj->splitString("a,s,h,i,s");