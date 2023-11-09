<?php
$a = 10;
 while ($a > 1 ){
    echo '$a'.'';
    if($a%2==0){
        $a=$a/2;
    }
    else{
        $a=3*$a+1;
    }
}

?>