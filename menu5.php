<?php
//menu5.php
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
$price = 0;

if(isset($_POST["checkOut"])){
    if(is_numeric($_POST["tacoQuantity"])){
        $tacoQuantity = $_POST["tacoQuantity"];
        $price += $tacoQuantity*4.95;
    }
    if(is_numeric($_POST["sundaeQuantity"])){
        $sundaeQuantity = $_POST["sundaeQuantity"];
        $price += $sundaeQuantity*5.95;
    }
    if(is_numeric($_POST["tacoQuantity"])){
        $saladQuantity = $_POST["saladQuantity"];
        $price += $saladQuantity*6.95;
    }
    
        
    
    echo("You selected $sundaeQuantity sundaes, $saladQuantity salads, and $tacoQuantity tacos. 
    your total is $price");
    
}else{
    echo 
        '
        <form class="" action=' . THIS_PAGE . ' method="post">
        <input type="radio" name="taco" value"taco">taco</br>
        <input type="text" name="tacoQuantity" value="tacoQuantity">how many tacos?</br>
        <input type="radio" name="sundae" value"sundae">sundae</br>
        <input type="text" name="sundaeQuantity" value="sundaeQuantity">how many sundaes?</br>
        <input type="radio" name="salad" value"salad">salad</br>
        <input type="text" name="saladQuantity" value="saladQuantity">how many salads?</br>
        <input type="submit" input name="checkOut" value="Check Out" />
          
        </form>
        ';
}
