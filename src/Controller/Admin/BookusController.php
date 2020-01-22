<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Bookus Controller
 *
 * @property \App\Model\Table\BookusTable $Bookus
 *
 * @method \App\Model\Entity\Bookus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bookus = $this->paginate($this->Bookus);

        $this->set(compact('bookus'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookus = $this->Bookus->get($id, [
            'contain' => []
        ]);

        $this->set('bookus', $bookus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookus = $this->Bookus->newEntity();
        if ($this->request->is('post')) {
            $bookus = $this->Bookus->patchEntity($bookus, $this->request->getData());
            if ($this->Bookus->save($bookus)) {
                $this->Flash->success(__('The bookus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookus could not be saved. Please, try again.'));
        }
        $this->set(compact('bookus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookus = $this->Bookus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookus = $this->Bookus->patchEntity($bookus, $this->request->getData());
            if ($this->Bookus->save($bookus)) {
                $this->Flash->success(__('The bookus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookus could not be saved. Please, try again.'));
        }
        $this->set(compact('bookus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookus = $this->Bookus->get($id);
        if ($this->Bookus->delete($bookus)) {
            $this->Flash->success(__('The bookus has been deleted.'));
        } else {
            $this->Flash->error(__('The bookus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
