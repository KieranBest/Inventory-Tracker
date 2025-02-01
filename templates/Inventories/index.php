<h1>Inventories</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($inventories as $inventory): ?>
    <tr>
        <td>
            <?= $this->Html->link($inventory->id, ['action' => 'view', $inventory->name]) ?>
        </td>
        <td>
            <?= $inventory->name ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
