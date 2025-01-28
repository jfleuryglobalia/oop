<?php

<?php

class MagicExample {
    private $properties = []; // Storage for dynamic properties.

    // The __set() method is triggered when writing to inaccessible or non-existent properties.
    public function __set($name, $value) {
        // Dynamically set a property.
        $this->properties[$name] = $value;
        echo "Property '$name' has been set to '$value'.\n";
    }

    // The __get() method is triggered when accessing inaccessible or non-existent properties.
    public function __get($name) {
        // Check if the property exists, then return its value.
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        // Handle the case where the property doesn't exist.
        echo "Property '$name' is not set.\n";
        return null;
    }

    // The __call() method is triggered when calling inaccessible or non-existent methods.
    public function __call($name, $arguments) {
        // Handle the call to a non-existent method.
        $argString = implode(', ', $arguments);
        echo "Method '$name' does not exist. Arguments passed: $argString\n";
    }
}

// Instantiate the class.
$magic = new MagicExample();

// Example of __set() usage.
$magic->title = "Magic in PHP"; // Dynamically setting a property.

// Example of __get() usage.
echo "Title: " . $magic->title . "\n"; // Dynamically getting the property.

// Accessing an undefined property (triggers __get).
echo "Author: " . $magic->author . "\n"; // Property doesn't exist.

// Example of __call() usage.
$magic->undefinedMethod('arg1', 'arg2'); // Call a non-existent method.

?>
