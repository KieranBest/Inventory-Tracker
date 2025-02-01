<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Event\EventInterface;

class InventoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }

    public function stock(int $value)
    {
        if ($value > 10) return "In stock";
        else if ($value > 0) return "Low stock";
        else return "Out of stock";
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->name);
            $entity->slug = substr($sluggedTitle, 0, 191);
            $entity->status = $this->stock($entity->quantity);
        }
    }
}
