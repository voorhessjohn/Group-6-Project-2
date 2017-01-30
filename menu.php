<?php
//menu.php

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
$price = 0;
//$items[] = null;

function checkOut(array $items){
    $itemCount = count($items);
    for($i=0; $i < $itemCount; $i++){
        $price += $items[$i]->Price;    
    }
    echo $price;
}#end checkOut

function takeOrder(){
        echo 
        '
        <form class="" action=' . THIS_PAGE . ' method="post">
          <select name="foodType">
            <option value="Taco">Taco</option>
            <option value="Sundae">Sundae</option>
            <option value="Salad">Salad</option>
            <input type="submit" value="Submit" />
            <input type="submit" input name="clearPost" value="Start Over" />
            <input type="submit" input name="checkOut" value="Check Out" />
          </select>
        </form>
        ';
}

class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    
    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        
    }#end Item constructor
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;    
    }#end addExtra
}#end Item class


if(isset($_POST["foodType"])){

    if($_POST["foodType"] == 'Taco'){
        $foodType = $POST["foodType"];
        $myItem = new Item(1,"Taco","Our Taco is awesome.",4.95);
        $items[] = $myItem;
        echo '<pre>';
        echo var_dump($items);
        echo '</pre>';
        takeOrder();

    }else if($_POST["foodType"] == 'Sundae'){
        $foodType = $POST["foodType"];
        $myItem = new Item(2,"Sundae","Our sundaes are awesome.",3.95);
        $items[] = $myItem;
        echo '<pre>';
        echo var_dump($items);
        echo '</pre>';
        takeOrder();

    }else if($_POST["foodType"] == 'Salad'){
        $foodType = $POST["foodType"];
        $myItem = new Item(3,"Salad","Our Salad is awesome",5.95);
        $items[] = $myItem;
        echo '<pre>';
        echo var_dump($items);
        echo '</pre>';
        takeOrder();
    }
}else{
    takeOrder();
}