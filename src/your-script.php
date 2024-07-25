<?php

// Display a greeting message
echo "Hello, welcome to my PHP script!\n";

// Define a function to calculate the square of a number
function square($num) {
    return $num * $num;
}

// Use the function to calculate and display the square of 5
$result = square(5);
echo "The square of 5 is: " . $result . "\n";

// Create an array of fruits
$fruits = array("Apple", "Banana", "Orange");

// Loop through the array and display each fruit
echo "List of fruits:\n";
foreach ($fruits as $fruit) {
    echo "- " . $fruit . "\n";
}

?>
