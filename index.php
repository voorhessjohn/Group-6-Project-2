<?php
/**
* index.php
* 
* it gets the users data, and gives the total value of 
* their orders.
*/

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

include "Item.php";

$itemDescipt1 = $items[0]->getDescription();

$itemDescipt2 = $items[1]->getDescription();

$itemDescipt3 = $items[2]->getDescription();


//Form for the user to choose how many of each item they want and what toppings they would like to add
echo '
    <title>Food Truck</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <form method = "post" action = ' . THIS_PAGE . '>
        <h1>Food Truck</h1>
        <h2>Menu</h2>
        <label>How many tacos:</label>
        <input type ="number" min="0" name="firstItemAmount"><br>
        <p>'.$itemDescipt1.'</p>
        Sour Cream <input type="checkbox" name="toppings1[]" value="sour cream"><br>
        Cheese <input type="checkbox" name="toppings1[]" value="cheese"><br>
        Hot Sauce <input type="checkbox" name="toppings1[]" value="hot sauce"><br>
        <br>
        <label>How many sundaes:</label>
        <input type ="number" min="0" name="secondItemAmount">
        <br>
        <p>'.$itemDescipt2.'</p>
        Sprinkles<input type="checkbox" name="toppings2[]" value="sprinkles"><br>
        Chocolate Sauce<input type="checkbox" name="toppings2[]" value="chocolate sauce"><br>
        Nuts<input type="checkbox" name="toppings2[]" value="nuts"><br>
        <br>
        <label>How many pizzas:</label> 
        <input type ="number" min="0" name="thirdItemAmount"><br>
        <p>'.$itemDescipt3.'</p>
        Pepperoni<input type="checkbox" name="toppings3[]" value="pepperoni"><br>
        Sausage<input type="checkbox" name="toppings3[]" value="sausage"><br>
        Bacon<input type="checkbox" name="toppings3[]" value="bacon"><br>
        <br>
        <input type ="submit" value="Order"><br>
          <div>
    ';

if($_POST)
{//show data  
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
    for($i=0;$i<count($items);$i++)
    {
          //if statement to check if the user wanted the particular item
         if($items[$i]->getAmount() > 0)
         {
            
            $additional = count($items[$i]->getExtras()) * .25;
             
            $cost = ($items[$i]->getPrice()+$additional) * $items[$i]->getAmount();
             
            $subTotal += $cost;
             
            echo $items[$i]->getAmount().' '.$items[$i]->getName().'<br>';
             
            
           //if statement to check if user wanted toppings on the particular item
            if(count($items[$i]->getExtras())!=0)
            {
                
                //Displays what toppings the user chose
                echo 'with:<br>';
                
                for($j=0;$j<count($items[$i]->getExtras());$j++)
                {
                    
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