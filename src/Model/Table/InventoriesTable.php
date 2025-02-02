<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Event\EventInterface;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class InventoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'last_updated' => 'always'
                ]
            ]
        ]);
        $this->addBehavior('Muffin/Trash.Trash');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            // name: Required, unique, must be between 3 and 50 characters.
            //
            ->notEmptyString('name')
            // ->add('name', 'length', ['rule' => ['lengthBetween', 3, 50]])
            // this does not allow a custom message
            ->minLength('name', 3)
            ->maxLength('name', 50)

            // quantity: Integer, >= 0, <= 1000.
            ->add('quantity', 'custom', [
                'rule' => function ($value) {
                    if ($value < 0 || $value > 1000) {
                        return 'Error, quantity is out of bounds.';
                    }
                    return true;
                }
            ])

            // price: Decimal, > 0, <= 10,000.
            ->add('price', 'custom', [
                'rule' => function ($value) {
                    if ($value < 0 || $value > 10000) {
                        return 'Error, price is out of bounds.';
                    }
                    return true;
                }
            ]);

            return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // Products with a price > 100 must have a minimum quantity of 10.
        $rules->add(
            function ($entity, $options) {
                if ($entity->price > 100 && $entity->quantity < 10) {
                    return 'Error, quantity must be more than 10.';
                }
                return true;
            },
            'quantityPriceMatch',
            [
                'errorField' => 'quantity'
            ]
        );

        // Products with a name containing "promo" must have a price < 50.
        $rules->add(
            function ($entity, $options) {
                if (str_contains($entity->name,'promo') && $entity->price >= 50) {
                    return 'Error, price must be below 50 due to promotion.';
                }
                return true;
            },
            'promoPrice',
            [
                'errorField' => 'price'
            ]
        );

        // Calculate the status dynamically based on quantity:
        $rules->add(
            function ($entity, $options) {
                if ($entity->quantity > 10) {
                    $entity->status = 'In stock';
                } else if ($entity->quantity > 0) {
                    $entity->status = 'Low stock';
                } else {
                    $entity->status = 'Out of stock';
                }
                return true;
            }
        );

        return $rules;
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedName = Text::slug($entity->name);
            $entity->slug = substr($sluggedName, 0, 191);
        }
    }
}
