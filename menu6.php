<?php
/*next line defines a constant variable to refer to this page.  This allows
the code to run on any server without changing address references*/

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

/*each of the following three statement constructs a new object
of the type, Item, and adds that item to an array of items.
These statements are called constructors.
*/
$myItem = new Item("Taco(s)","Our tacos are awesome",4.95,0);
$items[] = $myItem; 


$myItem = new Item("Sunday(s)","Our sundays are awesome",3.95,0);
$items[] = $myItem; 

                    
$myItem = new Item("Pizza(s)","Our pizzas are awesome",7.95,0);
$items[] = $myItem;

/*
This next block defines an Item
*/
class item{
    /*
    each of these elements is part of what makes up an "Item"
    */
    /*each Item has a name. The open set of single quotes denotes that
    the name element of an Item is of type String*/
    public $Name = '';
    /*each Item has a description, also a String*/
    public $Description = '';
    /*each Item has a price. The 0 indicates that this price is an integer*/
    public $Price = 0;
    /*each Item can have extras. The extras would be stored in an array*/
    public $Extras = array();
    /*each Item has an amount, an integer indicating how many of this
    particular item that the customer desires. This would be clearer if
    it were called "quantity", since "amount" typically refers to currency*/
    public $Amount = 0;

    /*The constructor is defined within the class definition.
    This particular constructor requires four parameters.
    This means that in order to use this special function to create
    a new instance of the type, Item, you must define name, description,
    price, and amount. A class can contain several different constructors
    depending on what parameters are passed to the constructor. However,
    this class only defines this one.*/
    public function __construct($Name,$Description,$Price,$Amount){

    $this->Name = $Name;
    $this->Description = $Description;
    $this->Price = $Price;
    $this->Amount = $Amount;

}
/*The following two functions define methods to add elements to an Item*/
public function addExtra($extra)
    {
        //$this->Extras[], "this dot extras", refers to the array that stores
        //extras in the particular Item with which we are working.
        $this->Extras[] = $extra;
    }
public function addAmount($amount)
    {
        $this->Amount = $amount;
    }
    /*The following several functions define methods used to retrieve
    values from our Item. Since each Item is technically an array of different
    objects, each of these elements, Price, Name, Description, Amount, and Extras,
    is like a reference to an index of the Item array, but refers directly to the
    name of the index, so it is agnostic of numeric order.*/
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
        return $this->Extras;
    }
}

/*Item descriptions are taken from each item and stored in variables
so that they may be displayed on the menu*/

$itemDescipt1 = $items[0]->getDescription();
$itemDescipt2 = $items[1]->getDescription();
$itemDescipt3 = $items[2]->getDescription();

/*The next echo block prints a form on the screen for the customer to fill out
an order. */
echo '
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <form method = "post" action = ' . THIS_PAGE . '>
    <h1>Menu</h1><br>
    How many tacos: <input type ="number" min="0" name="firstItemAmount" /><br />
    '.$itemDescipt1.'<br>
    <input type="checkbox" name="toppings1[]" value="sour cream"/>sour cream</br>
    <input type="checkbox" name="toppings1[]" value="cheese"/>cheese</br>
    <input type="checkbox" name="toppings1[]" value="hot sauce"/>hot sauce</br><br /><br />
    How many sundays: <input type ="number" min="0" name="secondItemAmount" /><br />
    '.$itemDescipt2.'<br>
    <input type="checkbox" name="toppings2[]" value="sprinkles"/>sprinkles</br>
    <input type="checkbox" name="toppings2[]" value="chocolate sauce"/>chocolate sauce</br>
    <input type="checkbox" name="toppings2[]" value="nuts"/>nuts</br><br /><br />
    How many pizzas: <input type ="number" min="0" name="thirdItemAmount" /><br />
    '.$itemDescipt3.'<br>
    <input type="checkbox" name="toppings3[]" value="pepperoni"/>pepperoni</br>
    <input type="checkbox" name="toppings3[]" value="sausage"/>sausage</br>
    <input type="checkbox" name="toppings3[]" value="bacon"/>bacon<br /><br />
    <input type ="submit" value="Order" /><br />
    <div>
    ';

/*If the POST data is set...*/
if($_POST){//show data
    /*Each element in our list of items receives a new quantity*/
    $items[0]->addAmount($_POST['firstItemAmount']);
    $items[1]->addAmount($_POST['secondItemAmount']);
    $items[2]->addAmount($_POST['thirdItemAmount']);
    /*variables that will be used to hold subtotal and total values are instantiated*/
    $subTotal = 0;
    $extrasTotal = 0;
    $totalPrice = 0;
    $extrasMultiplier = 0;
    
    /*if a POST value matching the toppings1 section of the form is pushed through...*/
    if(isset($_POST['toppings1'])){
        
        /*The value is stored as a variable*/
        $extra = $_POST['toppings1'];
        
        /*for each extra...*/
        foreach ($extra as $extras=>$value) {
            //we display the name of the extra that has been added
             echo "extra : ".$value."<br />";
            /*we add that extra to the array that stores extras in the
            first item of the array that stores our item. Since arrays use
            ordinal counting, the first item is at index location zero*/
             $items[0]->addExtra($extra);   
        }
        //we keep a running total of the value of the extras that have been added
        $extrasTotal += count($items[0]->Extras)*.25;
    }
    /*same as the last one*/
    if(isset($_POST['toppings2'])){
        $extra = $_POST['toppings2'];

        foreach ($extra as $extras=>$value) {
             echo "extra : ".$value."<br />";
             $items[1]->addExtra($extra);   
        }

        $extrasTotal += count($items[1]->Extras)*.25;
    }
    if(isset($_POST['toppings3'])){
        $extra = $_POST['toppings3'];

        foreach ($extra as $extras=>$value) {
             echo "extra : ".$value."<br />";
             $items[2]->addExtra($extra);   
        }

        $extrasTotal += count($items[2]->Extras)*.25;
    }
    
    
    
    
/*this is a for loop that runs through each item in our array of items
the "i" is an iterator variable. This is a typical programming convention.
There are three parts of a for loop, separated by semicolons. The first part
sets the initial value of the iterator variable. The second part states how long
is supposed to run. The third part increments the iterator variable.*/
    for($i=0;$i<count($items);$i++){
        //if the number of this particular item is greater than zero...
         if($items[$i]->getAmount() > 0){
            /*cost equals the price of the item at the index in which
            the for loop is currently running multiplied by the quantity
            of the item at the index in which the for loop is running.*/
            $cost = ($items[$i]->getPrice()) * $items[$i]->getAmount();
            /*I have used extrasMultiplier as a running cound of the quantity
            of extras that each item requires*/
            $extrasMultiplier += $items[$i]->getAmount();
            /*subtotal equals subtotal plus cost. This allows us to increment our subtotal
            each time we run through this loop and count our items*/
            $subTotal += $cost;
            /*Each time that this loop runs, we print the quantity, name, and subtotal
            for each item*/
            echo $items[$i]->getAmount().' '.$items[$i]->getName();
            echo '<br>$'.number_format($cost,2).'<br>';
            
        }
        
    }
    /*Outside of the for loop, after the loop runs, everything is added up and
    displayed to the customer*/
        $extrasTotal = $extrasTotal * $extrasMultiplier;
        $totalPrice = $subTotal + $extrasTotal;
        echo '<br>subtotal: $'.number_format($subTotal,2);
        echo '<br>extras total: $'.number_format($extrasTotal,2);
        echo '<br>Your total is: $'.number_format($totalPrice,2);
    
    
    }
echo 
    '
    </div>
    </form>
    ';
