<?php

// Define the first trait with a sayHello method
trait TraitA {
    public function sayHello() {
        echo "Hello from TraitA\n";
    }
}

// Define the second trait with a sayHello method (same name as in TraitA)
trait TraitB {
    public function sayHello() {
        echo "Hello from TraitB\n";
    }
}

// Define a class that uses both traits
class MyClass {
    use TraitA, TraitB {
        // Resolve the conflict by prioritizing TraitA::sayHello
        TraitA::sayHello insteadof TraitB;

        // Create an alias for TraitB::sayHello to access it explicitly
        TraitB::sayHello as sayHelloFromTraitB;
    }
}

// Create an instance of MyClass
$obj = new MyClass();

// Call the sayHello method (uses TraitA::sayHello due to insteadof resolution)
$obj->sayHello(); // Output: Hello from TraitA

// Call the sayHelloFromTraitB method (alias for TraitB::sayHello)
$obj->sayHelloFromTraitB(); // Output: Hello from TraitB
