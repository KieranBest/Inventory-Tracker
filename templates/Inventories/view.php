<h1><?= h($inventory->title) ?></h1>
<p><?= h($inventory->body) ?></p>
<p>
    <small>
        ID: <?= $inventory->id ?><br />
        Name: <?= $inventory->name ?><br />
        Price: <?= $inventory->price ?><br />
        Quantity: <?= $inventory->quantity ?><br />
        Status: <?= $inventory->status ?>
    </small>
</p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $inventory->slug]) ?></p>

