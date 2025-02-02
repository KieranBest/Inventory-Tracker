<h1>Product: <?= $inventory->name ?></h1>
<p>
    <small>
        ID: <?= $inventory->id ?><br />
        Name: <?= $inventory->name ?><br />
        Price: <?= $inventory->price ?><br />
        Quantity: <?= $inventory->quantity ?><br />
        Status: <?= $inventory->status ?><br />
        Last Updated: <?= $inventory->last_updated ?>
    </small>
</p>
<p>
    <?= $this->Html->link('Edit',
        ['action' => 'edit', $inventory->slug])
    ?>
</p>
<p>
    <?= $this->Form->postLink('Delete',
        ['action' => 'delete', $inventory->slug],
        ['confirm' => 'Are you sure?'])
    ?>
</p>
