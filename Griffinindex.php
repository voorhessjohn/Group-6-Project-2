<?php


//$count = 1;

$myItem = new Item("Taco(s)","Our tacos are awesome",4.95,0);
/*$myItem->addExtra('sour cream');
$myItem->addExtra('cheese');
$myItem->addExtra('hot sauce');*/
$items[] = $myItem; 


$myItem = new Item("Sunday(s)","Our sundays are awesome",3.95,0);
/*$myItem->addExtra('sprinkles');
$myItem->addExtra('chocolate sauce');
$myItem->addExtra('nuts');*/
$items[] = $myItem; 

                    
$myItem = new Item("Pizza(s)","Our pizzas are awesome",7.95,0);
/*$myItem->addExtra('bacon');
$myItem->addExtra('pepperoni');
$myItem->addExtra('tomatos');
$myItem->addExtra('sausage');*/
$items[] = $myItem;

    
class item{
public $Name = '';
public $Description = '';
public $Price = 0;
public $Extras = array();
public $Amount = 0;

public function __construct($Name,$Description,$Price,$Amount){
    
$this->Name = $Name;
$this->Description = $Description;
$this->Price = $Price;
$this->Amount = $Amount;
    
}//an item constructor
    
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
    }//end addExtra()
    
    public function addAmount($amount)
    {
        $this->Amount = $amount;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function getName()
    {
        return $this->Name;
    }
     public function getDescription()
    {
        return $this->Description;
    }
    public function getAmount()
    {
        return $this->Amount;
    }
    public function getExtras()
    {
        return $this->Extra;
    }
}//an item class
$itemDescipt1 = $items[0]->getDescription();
$itemDescipt2 = $items[1]->getDescription();
$itemDescipt3 = $items[2]->getDescription();

echo '
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <form method = "post" action = "index.php">
    <h1>Menu</h1><br>
    How many tacos: <input type ="number" min="0" name="firstItemAmount" /><br />
    '.$itemDescipt1.'<br>
    <input type="checkbox" name="toppings1" value="sour cream"/>
    <input type="checkbox" name="toppings1" value="cheese"/>
    <input type="checkbox" name="toppings1" value="hot sauce"/><br /><br />
    How many sundays: <input type ="number" min="0" name="secondItemAmount" /><br />
    '.$itemDescipt2.'<br>
    <input type="checkbox" name="toppings2" value="sprinkles"/>
    <input type="checkbox" name="toppings2" value="chocolate sauce"/>
    <input type="checkbox" name="toppings2" value="nuts"/><br /><br />
    How many pizzas: <input type ="number" min="0" name="thirdItemAmount" /><br />
    '.$itemDescipt1.'<br>
    <input type="checkbox" name="toppings2" value="pepperoni"/>
    <input type="checkbox" name="toppings2" value="sausage"/>
    <input type="checkbox" name="toppings2" value="bacon"/><br /><br />
    <input type ="submit" value="Order" /><br />
    <div>
    ';

if($_POST){//show data
    $items[0]->addAmount($_POST['firstItemAmount']);
    $items[1]->addAmount($_POST['secondItemAmount']);
    $items[2]->addAmount($_POST['thirdItemAmount']);
    $subTotal = 0;
   /* foreach($name as $toppings1)
    {
        $items[0]->addExtra($toppings1);
    }*/
   /* foreach($name as $toppings2)
    {
        $items[1]->addExtra($toppings2);
    }
    foreach($name as $toppings3)
    {
        $items[2]->addExtra($toppings3);
    }*/
    for($i=0;$i<count($items);$i++){
         if($items[$i]->getAmount() > 0){
            //$toppings = count($items[$i]->getExtra) * .25;
            $cost = ($items[$i]->getPrice()) * $items[$i]->getAmount();
            $subTotal += $cost;
            echo $items[$i]->getAmount().' '.$items[$i]->getName();
            echo '<br>$'.number_format($cost,2).'<br>';
        }
        
    }
        echo '<br>subtotal: $'.number_format($subTotal,2);
    }
echo 
    '
    </div>
    </form>
    ';
