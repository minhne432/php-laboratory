<?php

// Define a variable $value with null
$value = null;

// Using the ternary operator to check if $value is null and set a default value if it is
$result = $value ?? 10;

// Output the result
echo $result; // Output: 10

// Define a variable $anotherValue with a number
$anotherValue = 20;

// Using the ternary operator to check if $anotherValue is null and set a default value if it is
$anotherResult = $anotherValue ?? 30;

// Output the result
echo $anotherResult; // Output: 20
