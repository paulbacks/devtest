<?php

/**
 * Explanation: 
 * 
 * You are going to filter data supplied to your Main class 
 * as can be seen below. 
 * 
 * - The implementation is up to you. There is no predefined way of
 * making this test, except it should be object orientated. 
 * 
 * - It is not allowed to use external libraries. Look up the code in 
 * the autoload library. You may use this for defining 
 * extra namespaces and classes.
 *
 * - You are free to add any file wherever you wish
 *
 * - Below you will come across the following code
 * 		$app->myFunction();
 * While it might seem obvious, these lines are to be 
 * replaced with your own implementation
 * 
 * Good luck!
 */

require_once __DIR__ . "/../autoload_init.php";
$application = new Application\Main(include __DIR__ . '/../data/assessment.php');

echo '<link rel="stylesheet" href="style.css" type="text/css">';
echo '<div style="width: 100%">';
/**
 * return all males in a table.
 */
echo '<div style="width:25%; float: left;"><h1>All males</h1>';
echo $application->allMales();
echo '</div>';

/**
 * return all car models containing a 3
 */
echo '<div style="width:25%; float: left;"><h1>All modals with a 3</h1>';
echo $application->allCarModalsWithFilter('3');
echo '</div>';

/**
 * return all numbers greater than or equal to 1000
 */
echo '<div style="width:25%; float: left;"><h1>All numbers greater than 999';
echo $application->numberGreaterThan('999');
echo '</div>';

/**
 * return all phone numbers ending with 01
 */
echo '<div style="width:25%; float: left;"><h1>All phone numbers ending with 01</h1>';
echo $application->allPhoneNumbersEndingOn(01);
echo '</div>';

echo '</div>';