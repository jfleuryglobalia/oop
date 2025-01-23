<?php


// DTO (Data Transfer Object) for a user
class UserDTO
{
    private int $id;
    private string $name;
    private string $email;
    private ?string $passwordHash; // Password hash (not needed for serialization)

    public function __construct(int $id, string $name, string $email, ?string $passwordHash = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    // Magic method __sleep
    public function __sleep()
    {
        // Exclude `passwordHash` from serialization
        return ['id', 'name', 'email'];
    }

    // Magic method __wakeup (optional)
    public function __wakeup()
    {
        // Logic to reinitialize or validate after deserialization
        echo "UserDTO object deserialized.\n";
    }
}

// Example usage
$user = new UserDTO(1, "John Doe", "john.doe@example.com", "hashed_password");

// Serialize the object
$serializedUser = serialize($user);
echo "Serialized User: $serializedUser\n";

// Deserialize the object
$unserializedUser = unserialize($serializedUser);
