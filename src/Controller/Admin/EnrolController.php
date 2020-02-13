<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Enrol Controller
 *
 * @property \App\Model\Table\EnrolTable $Enrol
 *
 * @method \App\Model\Entity\Enrol[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnrolController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enrolmentstest', 'Lfmclasses']
        ];
        $enrol = $this->paginate($this->Enrol);

        $this->set(compact('enrol'));
    }

    /**
     * View method
     *
     * @param string|null $id Enrol id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enrol = $this->Enrol->get($id, [
            'contain' => ['Enrolmentstest', 'Lfmclasses', 'Enrol']
        ]);

        $this->set('enrol', $enrol);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enrol = $this->Enrol->newEntity();
        if ($this->request->is('post')) {
            $enrol = $this->Enrol->patchEntity($enrol, $this->request->getData());
            if ($this->Enrol->save($enrol)) {
                $this->Flash->success(__('The enrol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrol could not be saved. Please, try again.'));
        }
        $enrolmentstest = $this->Enrol->Enrolmentstest->find('list', ['limit' => 200]);
        $lfmclasses = $this->Enrol->Lfmclasses->find('list', ['limit' => 200]);
        $this->set(compact('enrol', 'enrolmentstest', 'lfmclasses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enrol id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enrol = $this->Enrol->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enrol = $this->Enrol->patchEntity($enrol, $this->request->getData());
            if ($this->Enrol->save($enrol)) {
                $this->Flash->success(__('The enrol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrol could not be saved. Please, try again.'));
        }
        $enrolmentstest = $this->Enrol->Enrolmentstest->find('list', ['limit' => 200]);
        $lfmclasses = $this->Enrol->Lfmclasses->find('list', ['limit' => 200]);
        $this->set(compact('enrol', 'enrolmentstest', 'lfmclasses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enrol id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enrol = $this->Enrol->get($id);
        if ($this->Enrol->delete($enrol)) {
            $this->Flash->success(__('The enrol has been deleted.'));
        } else {
            $this->Flash->error(__('The enrol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
