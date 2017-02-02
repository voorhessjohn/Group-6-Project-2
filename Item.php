<?php

$myItem = new Item("Taco(s)","Our tacos are awesome",4.95,0);
$items[] = $myItem; 


$myItem = new Item("Sundae(s)","Our sundaes are awesome",3.95,0);
$items[] = $myItem; 

                    
$myItem = new Item("Pizza(s)","Our pizzas are awesome",7.95,0);
$items[] = $myItem;

    
class Item{
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    public $Amount = 0;
    
    /*
     * item constructor
     *
     * constructs an object of type item
     *
     * @param $Name (String) The name of the item
     * @param $Description (String) Description of the item
     * @param $Price (Integer) Item price in dollars
     * @param $Amount (Integer) Quantity of the item
     * @return (void) does not return
     */

    public function __construct($Name,$Description,$Price,$Amount){
    
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Amount = $Amount;
    
        
    }//an item constructor
    /*
     * addExtra()
     *
     * adds an extra to the array of extras in an item
     *
     * @param $extra (Object) any object can be added to the extra array
     * @return (void) does not return
     */
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
    }//end addExtra()
    
    
    public function addAmount($amount)//Function that adds how many of an item a user wants
    {
        $this->Amount = $amount;
    }//end addAmount
    
    //functions to get individual attributes of an object
    /*
     * getPrice()
     *
     * function returns the price of the item
     * does not take a parameter
     * @return (Integer) returns item Price
     */
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