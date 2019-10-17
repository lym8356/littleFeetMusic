<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lfmclasses Controller
 *
 * @property \App\Model\Table\LfmclassesTable $Lfmclasses
 *
 * @method \App\Model\Entity\Lfmclass[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LfmclassesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Terms']
        ];

        $lfmclasses = $this->paginate($this->Lfmclasses);

        $this->set(compact('lfmclasses'));
    }

    /**
     * View method
     *
     * @param string|null $id Lfmclass id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lfmclass = $this->Lfmclasses->get($id, [
            'contain' => ['Terms']
        ]);

        $this->set('lfmclass', $lfmclass);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lfmclass = $this->Lfmclasses->newEntity();
        if ($this->request->is('post')) {
            $lfmclass = $this->Lfmclasses->patchEntity($lfmclass, $this->request->getData());
            if ($this->Lfmclasses->save($lfmclass)) {
                $this->Flash->success(__('The lfmclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lfmclass could not be saved. Please, try again.'));
        }
        $terms = $this->Lfmclasses->Terms->find('list', ['limit' => 200]);
        $this->set(compact('lfmclass', 'terms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lfmclass id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lfmclass = $this->Lfmclasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lfmclass = $this->Lfmclasses->patchEntity($lfmclass, $this->request->getData());
            if ($this->Lfmclasses->save($lfmclass)) {
                $this->Flash->success(__('The lfmclass has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lfmclass could not be saved. Please, try again.'));
        }
        $terms = $this->Lfmclasses->Terms->find('list', ['limit' => 200]);
        $this->set(compact('lfmclass', 'terms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lfmclass id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lfmclass = $this->Lfmclasses->get($id);
        if ($this->Lfmclasses->delete($lfmclass)) {
            $this->Flash->success(__('The lfmclass has been deleted.'));
        } else {
            $this->Flash->error(__('The lfmclass could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
