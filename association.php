<?php

class Student {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class School {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// Simple association:
$student = new Student('John');
$school = new School('High School');

// The student is associated with the school, but they are independent objects.
echo $student->getName() . ' is associated with ' . $school->getName();
