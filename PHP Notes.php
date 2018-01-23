<?php /*
PHP Notes
================
Rules for PHP variables:
- A variable name must start with a letter or an underscore
- A variable name cannot start with a number
- A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )
- Variable names are case-sensitive ($name and $NAME would be two different variables)
*/
$variable = set equal to something;
$variable == loose equality;
$variable === strict equality;
$snakeCase = echo "{$interpolation_variable}" . " joining" . " convention";

/* Variable Variables
 $$a is a variable that is using the value of another variable, $a, as its name. The value of $a is equal to "hello". The resulting variable is $hello, which holds the value "Hi!".
 */
$a = 'hello';
$hello = "Hi!";
echo $$a; // Outputs 'Hi!' => $hello b/c $a is called 'hello', think about it this way $ assigned to $a => $hello => "hi!"

// Operators & Assingments
1 + 1; 
1 - 1;
1 * 1;
1 / 1;
14 % 3; // = 2; this is a modulus
$x++ // post-increment
$x--
--$x // pre-increment
++$x //
// Example: $b = $x++ (when $x = 3) output $b = 3
// The difference is the post-increment returns the original value before it changes, while the pre-increment changes and then returns the value.

// Assignment Operators
X+=y;
X-=y;
X*=y;
X/=y;
X%=y;

// Comparison Operators
==		$x equal to $y // 2 = "2" => true
===		$x identical to $y // equal & same type 2 = "2" => false
!=		$x not equal to $y
<>		$x no equal to $y 
!==		$x not identical to $y
>			$x greater than $y
<			$x less than $y
>=		$x greater than or equal $y
<=		$x less than or equals $y

// Logical Operators
and		$x and $y both must be true
or		$x or $y either is true
xor		$x xor $y only 1 is true, not both
&&		$x && $y both must be true
||		$x || $y either is true
!			!$x is no true, also !!$x returns a boolean?

// IF, ELSEIF, ELSE
if ($statement == true) {
	"Code";
} elseif ($statement >= 1) {
	"Checked Out";
} else {
	print "All have failed";
}

// define a constant
define(name, value, case-insensitive) // default is false to case-insensitive, thus they ARE case sensitive

switch ($variable) {
	case 0:
		print 'and *break* or I will keep checking cases';
		break;
	case 1;
		break;
	default:
		print 'If all else fails';
} //can use ':' and 'endswitch;' instead of curly braces

// PHP Loop Functions
for 		(start, end, iteration) {print "for($i = 1, $i < 10, $i++)";}
foreach ($array as $element) 		{print "<li>{$element}</li>";} // only works on arrays/associated arrays
while 	($loopCond == true) {
	$flip = rand(0,1);
	$count++;
} // can also be 'endwhile;'
	continue 	// skips remaining code in iteration and goes to next iteration
	break 		// breaks out of loops or switch statement or script


foreach ($assocArray as $key=>$value) {"looping though the {$key} and {$value}";} // looping through an associative array

do {
	print "first I run, then I check and maybe run again. Be sure to end with semicolon";
} while ($loopCond >= 5);

// Control structures
include 'header.php'; //absolute or relative path; will skip if not found.
require 'header.php'; //if not included, will produce fatal error

// PHP Array Functions
$array = array("1", "2", "etc...");
$array[0] = 2; // => 2
unset($array[0]); or unset($array);
array_push($array, element);
sort($array); // sort in ascending
join(",", $array);
rsort($array); // sort in reverse (descending)
count($array);

// PHP Associative Array (aka Hash)
$assocArray = array('key' => 'value', 'secondKey' => 'secondValue');
$assocArray['key']; // => value


//Multi-Dimensional Arrays
$people = array(
   'online'=>array('David', 'Amy'),
   'offline'=>array('John', 'Rob', 'Jack'),
   'away'=>array('Arthur', 'Daniel')
);

// this array has a row & column

// PHP common String functions
strlen($string);
substr($string,start,length);
strtoupper($string);
strtolower($string);
strpos($string, substring) === truthy/falsey

// PHP common Math functions
round(M_PI); //M_PI is pi 3.14...
rand(min,max);

// PHP Function defining
$notice = "functions can't access global variables";
function snakeCase($arguments, $parameters) {
	global $notice;
	echo "{$arguments} & {$parameters}";

}

// PHP Object Oriented Programming
class Constructor {
	public $properties = true;
	public $tbd_properties;
	public function __contruct($arg1, $arg2) {
		$this->arg1 = $arg1;
		$this->arg1 = $arg1;
		// special function, all listed attributes are required to instantiate new object
	}

	public function anyMethod() {
		prints "{$this->properties} is similar to 'self.property' in Ruby";
	}

	final public function finalWord() {
		"No sub class or child can override this function!";
	}
}

$object = new Constructor(arg1, arg2);
$object->arg1; // return property of object

// Built in functions
is_a($me, "Person");
property_exists($me, "name");
method_exists($me, "dance");

// Inheritance
class Banana extends Fruit {
	const stuff = "Immutable nor do I start with a '$'";
	public static $classProperty = "I'm accessible w/o an intance of my class, but I use a $";
	public static function allAccess {
		 return "I'm accessible w/o an intance of my class";
	}
	echo "Banana < Fruit in how we inherit in Ruby";
}

Fruit::property; // we can access the Class 'const'ant directly via ::
Fruit::method(); // we can access methods or properties via the 'static' prefix in a CLass












// ====================
?>
