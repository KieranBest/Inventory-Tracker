<h1>Inventories</h1>

<?= $this->Html->link('Add Item', ['action' => 'add']) ?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

    <?php foreach ($inventories as $inventory): ?>
    <tr>
        <td>
            <?= $this->Html->link($inventory->id, ['action' => 'view', $inventory->id]) ?>
        </td>
        <td>
            <?= $inventory->name ?>
        </td>
        <td>
            <?= $inventory->price ?>
        </td>
        <td>
            <?= $inventory->status ?> - <?= $inventory->quantity ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
