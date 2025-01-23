<?php

class Example {
    // Public property: accessible from anywhere
    public $publicProperty = "Public Property";

    // Protected property: accessible only within the class and its subclasses
    protected $protectedProperty = "Protected Property";

    // Private property: accessible only within the class
    private $privateProperty = "Private Property";

    // Method to demonstrate access within the class
    public function showProperties() {
        echo $this->publicProperty . "\n";    // Accessible
        echo $this->protectedProperty . "\n"; // Accessible
        echo $this->privateProperty . "\n";   // Accessible
    }
}

// Subclass to demonstrate protected access
class SubExample extends Example {
    public function showProtectedProperty() {
        // Protected property is accessible in subclasses
        echo $this->protectedProperty . "\n";
    }

    // Uncommenting the following will cause an error as private properties are not inherited
    // public function showPrivateProperty() {
    //     echo $this->privateProperty . "\n";
    // }
}

// Instantiate the main class
$example = new Example();
$example->showProperties(); // Access properties from within the class

// Accessing properties directly from outside the class
echo $example->publicProperty . "\n"; // Accessible

// Uncommenting the following lines will cause errors
// echo $example->protectedProperty . "\n"; // Error: Cannot access protected property
// echo $example->privateProperty . "\n";   // Error: Cannot access private property

// Instantiate the subclass
$subExample = new SubExample();
$subExample->showProtectedProperty(); // Access protected property via subclass
