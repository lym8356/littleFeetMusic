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
        $dataArray = [];


        //get all terms with the day_id = 1
        $termsData = TableRegistry::getTableLocator()->get('Terms')->find()->where(['day_id' => 1])->contain(['Days','Lfmclasses']);
        $now = date('Y-m-d');
        foreach($termsData as $key1=>$term){

            $classData = TableRegistry::get('Lfmclasses')->find('all',
                ['conditions' => ['Lfmclasses.terms_id' => $term['id'], "Lfmclasses.class_date>='$now'"]])->order(['class_date' => 'ASC'])->toArray();
            foreach($classData as $class){
                $enrolmentData = $enrollment=TableRegistry::get('Enrolments')->find('all',['conditions'=>['Enrolments.lfmclasses_id'=>$class['id']]])
                    ->toArray();
                foreach($enrolmentData as $key3=>$enrolment){
                    $childData = TableRegistry::get('Childs')->find('all',['conditions'=>['Childs.id'=>$enrolment['child_id']]])->toArray();
                    $guardianData=TableRegistry::get('Users')->find('all',['conditions'=>['Users.id'=>$enrolment['user_id']]])->toArray();

                    //pr($childData);die;
                    $dataArray[$term['id']][$class['id']][$enrolment['id']]['child']= $childData['first_name'];
                    $dataArray[$term['id']][$class['id']][$enrolment['id']]['user']= $guardianData['f_name'];
                }
            }

        }
        pr($dataArray);die;

        $enrolments = $this->paginate($this->Enrolments);

        $this->set(compact('enrolments','dataArray'));
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
