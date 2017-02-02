<?php


//Create objects of Item adds them to an array
$myItem = new Item("Taco(s)","Our tacos are awesome",4.95,0);
$items[] = $myItem; 


$myItem = new Item("Sundae(s)","Our sundaes are awesome",3.95,0);
$items[] = $myItem; 

                    
$myItem = new Item("Pizza(s)","Our pizzas are awesome",7.95,0);
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
    
    public function addAmount($amount)//Function that adds how many of an item a user wants
    {
        $this->Amount = $amount;
    }//end addAmount
    
    //functions to get individual attributes of an object
    public function getPrice()
    {
        return $this->Price;
    }//end getPrice()
  
    public function getName()
    {
        return $this->Name;
    }//end getName()
  
     public function getDescription()
    {
        return $this->Description;
    }//end getDescription
  
    public function getAmount()
    {
        return $this->Amount;
    }//end getAmount()
  
    public function getExtras()
    {
        return $this->Extras;
    }//end getExtras()
}//an item class

$itemDescipt1 = $items[0]->getDescription();
$itemDescipt2 = $items[1]->getDescription();
$itemDescipt3 = $items[2]->getDescription();

//Form for the user to choose how many of each item they want and what toppings they would like to add
echo '
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <form method = "post" action = "index.php">
    <h1>Menu</h1><br>
    How many tacos: <input type ="number" min="0" name="firstItemAmount" /><br />
    '.$itemDescipt1.'<br>
    sour cream <input type="checkbox" name="toppings1[]" value="sour cream"/>
    cheese <input type="checkbox" name="toppings1[]" value="cheese"/>
    hot sauce <input type="checkbox" name="toppings1[]" value="hot sauce"/><br /><br />
    
    How many sundaes: <input type ="number" min="0" name="secondItemAmount" /><br />
    '.$itemDescipt2.'<br>
    sprinkles<input type="checkbox" name="toppings2[]" value="sprinkles"/>
    chocolate sauce<input type="checkbox" name="toppings2[]" value="chocolate sauce"/>
    nuts<input type="checkbox" name="toppings2[]" value="nuts"/><br /><br />
    
    How many pizzas: <input type ="number" min="0" name="thirdItemAmount" /><br />
    '.$itemDescipt1.'<br>
    pepperoni<input type="checkbox" name="toppings3[]" value="pepperoni"/>
    sausage<input type="checkbox" name="toppings3[]" value="sausage"/>
    bacon<input type="checkbox" name="toppings3[]" value="bacon"/><br /><br />
    <input type ="submit" value="Order" /><br />
    <div>
    ';

if($_POST){//show data  
    $items[0]->addAmount($_POST['firstItemAmount']);
    $items[1]->addAmount($_POST['secondItemAmount']);
    $items[2]->addAmount($_POST['thirdItemAmount']);
    $subTotal = 0;
    
    //populate arrays for each indiviual object with an array of the toppings the user wants
    if(!empty($_POST['toppings1']))
    {
        foreach( $_POST['toppings1'] as $toppings)
      {
        $items[0]->addExtra($toppings);
      }
    }
    
    if(!empty($_POST['toppings2']))
    {
        foreach($_POST['toppings2'] as $toppings)
      {
        $items[1]->addExtra($toppings);
      }
    }
    
    
    if(!empty($_POST['toppings3']))
    {
        foreach( $_POST['toppings3'] as $toppings)
      {
        $items[2]->addExtra($toppings);
      }
    }
    
    //Loop that runs through all the objects in the $items array  
    for($i=0;$i<count($items);$i++){
          //if statement to check if the user wanted the particular item
         if($items[$i]->getAmount() > 0){
            $additional = count($items[$i]->getExtras()) * .25;
            $cost = ($items[$i]->getPrice()+$additional) * $items[$i]->getAmount();
            $subTotal += $cost;
            echo $items[$i]->getAmount().' '.$items[$i]->getName().'<br>';
            
           //if statement to check if user wanted toppings on the particular item
            if(count($items[$i]->getExtras())!=0)
            {
                //Displays what toppings the user chose
                echo 'with:<br>';
                for($j=0;$j<count($items[$i]->getExtras());$j++){
                echo $items[$i]->getExtras()[$j].'<br>';
                } 
            }      
            echo '$'.number_format($cost,2).'<br><br>';
        }
        
    }
        $tax = $subTotal*0.095;//calculates a 9.5% tax
        $total = $subTotal+$tax;
  
        echo '<br>Subtotal: $'.number_format($subTotal,2);
        echo '<br>Tax: $'.number_format($tax,2);
        echo '<br>Total: $'.number_format($total,2);
    }
echo 
    '
    </div>
    </form>
    ';
