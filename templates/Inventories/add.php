<h1>Add Item</h1>
<?php
    echo $this->Form->create($inventory);
    echo $this->Form->control('id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('name');
    echo $this->Form->control('price');
    echo $this->Form->control('quantity');
    echo $this->Form->button(__('Add Inventory'));
    echo $this->Form->end();
?>
