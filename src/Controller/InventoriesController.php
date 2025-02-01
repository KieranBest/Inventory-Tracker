<?php

namespace App\Controller;

class InventoriesController extends AppController
{
    public function index()
    {
        $inventories = $this->paginate($this->Inventories);
        $this->set(compact('inventories'));
    }

    public function view($id = null)
    {
        $inventory = $this->Inventories->findById((string)$id)->firstOrFail();
        $this->set(compact('inventory'));
    }
}
