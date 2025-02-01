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
        $inventory = $this->Inventories->findById($id)->firstOrFail();
        $this->set(compact('inventory'));
    }

    public function add()
    {
        $inventory = $this->Inventories->newEmptyEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $inventory->id = 1;

            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('Your item has been added to inventory.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add to inventory.'));
        }
        $this->set('inventory', $inventory);
    }
}
