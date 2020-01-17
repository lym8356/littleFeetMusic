<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Enrolments Controller
 *
 * @property \App\Model\Table\EnrolmentsTable $Enrolments
 *
 * @method \App\Model\Entity\Enrolment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnrolmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lfmclasses', 'Users', 'Childs']
        ];

        //get all terms with the day_id = 1
        $terms = TableRegistry::getTableLocator()->get('Terms')->find()->where(['day_id' => 1])->contain(['Days','Lfmclasses']);
        $enrolment = $this->Enrolments->find()->contain('Lfmclasses.Terms')->where(['lfmclasses.terms_id' => 97]);
//        foreach($enrolment as $en):
//            pr($en->id);
//        endforeach;

        $enrolments = $this->paginate($this->Enrolments);

        $this->set(compact('enrolments','terms'));
    }

    /**
     * View method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enrolment = $this->Enrolments->get($id, [
            'contain' => ['Lfmclasses', 'Users', 'Childs']
        ]);

        $this->set('enrolment', $enrolment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enrolment = $this->Enrolments->newEntity();
        if ($this->request->is('post')) {
            $enrolment = $this->Enrolments->patchEntity($enrolment, $this->request->getData());
            if ($this->Enrolments->save($enrolment)) {
                $this->Flash->success(__('The enrolment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
        }
        $lfmclasses = $this->Enrolments->Lfmclasses->find('list', ['limit' => 200]);
        $users = $this->Enrolments->Users->find('list', ['limit' => 200]);
        $childs = $this->Enrolments->Childs->find('list', ['limit' => 200]);
        $this->set(compact('enrolment', 'lfmclasses', 'users', 'childs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enrolment = $this->Enrolments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enrolment = $this->Enrolments->patchEntity($enrolment, $this->request->getData());
            if ($this->Enrolments->save($enrolment)) {
                $this->Flash->success(__('The enrolment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
        }
        $lfmclasses = $this->Enrolments->Lfmclasses->find('list', ['limit' => 200]);
        $users = $this->Enrolments->Users->find('list', ['limit' => 200]);
        $childs = $this->Enrolments->Childs->find('list', ['limit' => 200]);
        $this->set(compact('enrolment', 'lfmclasses', 'users', 'childs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enrolment = $this->Enrolments->get($id);
        if ($this->Enrolments->delete($enrolment)) {
            $this->Flash->success(__('The enrolment has been deleted.'));
        } else {
            $this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
