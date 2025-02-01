<h1>Add Item</h1>
<?php
    echo $this->Form->create($inventory);
    echo $this->Form->control('name');
    echo $this->Form->control('price');
    echo $this->Form->control('quantity');
    echo $this->Form->button(__('Add Item'));
    echo $this->Form->end();
?>
