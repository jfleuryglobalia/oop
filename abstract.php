<?php

abstract class AbstractDTO {
    /**
     *
     *
     * @return array
     */
    abstract public function toArray(): array;
}

class UserDTO extends AbstractDTO {
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        $this->name  = $name;
        $this->email = $email;
    }

    public function toArray(): array {
        return [
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}

class ProductDTO extends AbstractDTO {
    private string $title;
    private float $price;


    public function __construct(string $title, float $price) {
        $this->title = $title;
        $this->price = $price;
    }

    public function toArray(): array {
        return [
            'title' => $this->title,
            'price' => $this->price,
        ];
    }
}

function transformDTOToArray(AbstractDTO $dto): array {
    return $dto->toArray();
}

/**
 * Transforme un tableau de DTO (instances de AbstractDTO) en tableau de tableaux.
 *
 * @param AbstractDTO[] $dtos
 * @return array
 */
function transformCollectionToArray(array $dtos): array {
    return array_map(fn(AbstractDTO $dto) => $dto->toArray(), $dtos);
}

