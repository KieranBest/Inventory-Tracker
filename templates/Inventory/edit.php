<h1>Edit Item</h1>
<?php

use Seld\PharUtils\Timestamps;

    echo $this->Form->create($inventory);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('name');
    echo $this->Form->control('price');
    echo $this->Form->control('quantity');
    echo $this->Form->button(__('Edit Item'));
    echo $this->Form->end();
?>
