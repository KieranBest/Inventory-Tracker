<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Inventory extends Entity
{
    protected array $_accessible = [
        'id' => true,
        'name' => true,
        'quantity' => true,
        'price' => true,
        'status' => true,
    ];
}
