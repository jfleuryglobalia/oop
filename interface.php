<?php

/**
 * Contract for DTOs: they must be able to transform into an array.
 */
interface DTOInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}

/**
 * Contract for validating data.
 */
interface ValidatableInterface
{
    /**
     * @return bool Returns true if the data is valid, false otherwise.
     */
    public function validate(): bool;
}

class UserDTO implements DTOInterface, ValidatableInterface
{
    private string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }

    public function toArray(): array
    {
        return [
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }

    public function validate(): bool
    {
        // Simple example: check if the email is valid
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

class ProductDTO implements DTOInterface, ValidatableInterface
{
    private string $title;
    private float $price;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
        ];
    }

    public function validate(): bool
    {
        // Example: check if the price is positive
        return $this->price > 0;
    }
}


function transformDTOToArray(DTOInterface $dto): array
{
    return $dto->toArray();
}

function isDataValid(ValidatableInterface $validatable): bool
{
    return $validatable->validate();
}

/**
 * @param DTOInterface[] $dtos
 */
function transformCollectionToArray(array $dtos): array
{
    return array_map(fn(DTOInterface $dto) => $dto->toArray(), $dtos);
}
