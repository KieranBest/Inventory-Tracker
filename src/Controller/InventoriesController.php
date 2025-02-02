<?php

namespace App\Controller;

class InventoriesController extends AppController
{
    public function index()
    {
        $inventories = $this->paginate($this->Inventories);
        $this->set(compact('inventories'));
    }

    public function view($slug = null)
    {
        // Is it better to view by slug or view by ID?
        $inventory = $this->Inventories->findBySlug($slug)->firstOrFail();
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
        if ($this->Inventories->delete($inventory)) {
            $this->Flash->success(__('The {0} item has been deleted.', $inventory->name));

            return $this->redirect(['action' => 'index']);
        }
    }
}
