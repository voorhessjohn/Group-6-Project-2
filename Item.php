<?php

/**
* Item.php
*
* It creates the Class Item and its objects represent 
* the Menu.
*/

/**
* Class Item
*
* represent an item in the Menu and its extras. 
* It creates the following propreties:
* name, description, price, extras and amount
*
* @see Class Item
*/


class Item
{
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    public $Amount = 0;
    
    /**
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
    public function __construct($Name,$Description,$Price,$Amount)
    {
    
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Amount = $Amount;
    
        
    }//an item constructor
    /**
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
    }//end function addExtra()
    
    /**
    * addAmount
    *
    * adds how many of an item a user wants
    *
    */
    public function addAmount($amount)
    {
        $this->Amount = $amount;
    }//end function addAmount
    
    //functions to get individual attributes of an object
    /**
     * getPrice()
     *
     * function returns the price in dolla of the item
     * does not take a parameter
     * @return (Integer) returns item Price
     */
    public function getPrice()
    {
        return $this->Price;
    }//end function getPrice()
    /**
     * getName()
     *
     * function returns the name of the item
     * does not take a parameter
     * @return (string) returns item Name
     */ 
    public function getName()
    {
        return $this->Name;
    }//end function getName()
    /**
     * getDescription()
     *
     * function returns the description of the item
     * does not take a parameter
     * @return (string) returns item Price
     */
     public function getDescription()
    {
        return $this->Description;
    }//end function getDescription
    /**
     * getAmount()
     *
     * function returns the quantity of the item
     * does not take a parameter
     * @return (Integer) returns item Amount
     */
    public function getAmount()
    {
        return $this->Amount;
    }//end function getAmount()
    /**
     * getExtras()
     *
     * function returns the chosen extra(s) of the item
     * does not take a parameter
     * @return (string) returns item Extra(s)
     */
    public function getExtras()
    {
        return $this->Extras;
    }//end function getExtras()
    
}//an item class

/**
* Objects of the Class Item which represent the Menu.
*
*/

$myItem = new Item("Taco(s)","Our tacos are awesome!",4.95,0);
$items[] = $myItem; 
$myItem = new Item("Sundae(s)","Our sundaes are awesome!",3.95,0);
$items[] = $myItem; 
                    
$myItem = new Item("Pizza(s)","Our pizzas are awesome!",7.95,0);
$items[] = $myItem;
