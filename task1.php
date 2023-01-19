<?php
//    Task 1 code break into 4 functions 

     function setValue()
    {
        $val=isset($_GET['test']) ? $_GET['test'] : 'null';
        return $val;
    }
    $val=setValue();
     function checkLength($str)
    {
        $len=strlen($str);
        return $len;
    }
    $len = checkLength($val);
    //echo $len;
     function convertString($length, $val)
    {
        if($length < 2) {
            $upperCaseString = strtoupper($val);
            printString($upperCaseString);
            } elseif ($length >= 2 && false == strpos(trim($val), ' ')) {
            /**
            * check if the string is having length more than 2 and not having any space
            * Then convert this to lower case and print the string
            */
            $lowerCaseString = strtolower($val);
            printString($lowerCaseString);
            } elseif ($length > 2 && strpos(trim($val), ' ') > 0) {
            /**
            * check if the string is having length more than 2 and having any space
            * Then convert this to sentence case and print the string
            */
            $sentenceCaseString = ucfirst(strtolower($val));
            echo $sentenceCaseString;
            printString($sentenceCaseString);
            } else {
            echo "Could not understand the string";
            }
    }
    convertString($len,$val);
     function printString(string $str)
    {
        echo "Converted ".$str;
    }
?>
<html>
   <body>
        <form action="" method="post">
            <input type="text" name="test" plcaceholder="Enter String">
            <input type="submit" name="submit">
        </form>
    </body>
</html>