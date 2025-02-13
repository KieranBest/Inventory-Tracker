<h1>Inventories</h1>

<?= $this->Form->create(null, ['url' => ['action' => 'search']]) ?>
<?= $this->Form->control('search') ?>
<?= $this->Form->submit('Search') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Add Item', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Stock</th>
        <th>Last Updated</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($inventories as $inventory): ?>
    <tr>
        <td>
            <?= $this->Html->link($inventory->name, ['action' => 'view', $inventory->slug]) ?>
        </td>
        <td>
            <?= $inventory->price ?>
        </td>
        <td>
            <?= $inventory->quantity ?>
        </td>
        <td>
            <?= $inventory->status ?>
        </td>
        <td>
            <?= $inventory->last_updated ?>
        </td>
        <td>
            <?= $this->Html->link('Edit',
                ['action' => 'edit', $inventory->slug])
            ?>
            &nbsp;&nbsp;&nbsp;
            <?= $this->Form->postLink('Delete',
                ['action' => 'delete', $inventory->slug],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
