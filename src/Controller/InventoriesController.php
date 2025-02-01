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

            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('Your item has been added to inventory.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add to inventory.'));
        }
        $this->set('inventory', $inventory);
    }

    public function edit($slug)
    {
        $inventory = $this->Inventories->findBySlug($slug)->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Inventories->patchEntity($inventory, $this->request->getData());
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The item has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the item.'));
        }

        $this->set('inventory', $inventory);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $inventory = $this->Inventories->findBySlug($slug)->firstOrFail();
        $inventory->deleted = 'TRUE';
        if ($inventory->deleted) {
            $this->Flash->success(__('The {0} article has been deleted.', $inventory->name));

            return $this->redirect(['action' => 'index']);
        }
    }
}
