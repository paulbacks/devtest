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

/**
 * The following method will return all male people
 *
 * @todo implementation
 */
$application->myFunction();

/**
 * The following method will return all car models containing 3
 *
 * @todo implementation
 */
$application->myFunction();

/**
 * The following method will return all numbers greater than or equal to 1000
 *
 * @todo implementation
 */
$application->myFunction();

/**
 * The following method will return all phone numbers ending with 01
 *
 * @todo implementation
 */
$application->myFunction();

/**
 * You may remove this code 
 */
echo <<<EOF
	<h2>REYEZ! development test</h2>
EOF;
