<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Enrolmentstest Controller
 *
 * @property \App\Model\Table\EnrolmentstestTable $Enrolmentstest
 *
 * @method \App\Model\Entity\Enrolmentstest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnrolmentstestController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Users', 'Childs']
//        ];
//        $enrolmentstest = $this->paginate($this->Enrolmentstest);
//
//        $this->set(compact('enrolmentstest'));


    }

    public function tabTest(){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
        }
        $dayVariable = $this->request->getQuery('dayID') ;
        $termsData = TableRegistry::getTableLocator()->get('Terms')->find()->where(['day_id' =>$dayVariable])
            ->contain(['Days','Lfmclasses'])->toArray();

        $dataArray = [];
        foreach($termsData as $term) {
            $localArray = [];
            $dateHeader = [];
            $localTermArray = array(
                "Age group" => $term->age_group,
                "Day" => $term->day->name,
                "Time" => date("G:i", strtotime($term->start_time))."-".date("G:i", strtotime($term->end_time)),
                "Price" => "$".$term->lfmclasses[0]->price,
                "Casual Price" => "$".$term->casual_rate
            );
            $localArray['termData'] = $localTermArray;

            $dateDynamicHeader = array_map(function($e) {
                return is_object($e) ? date('d/m',strtotime($e->class_date)) :date('d/m',strtotime($e['class_date']));
            }, $term['lfmclasses']);

            $staticHeader=['Child’s name','Adult','DOB', 'Phone', 'Comments', 'Payment Type'];
            $headerData=array_merge($staticHeader,$dateDynamicHeader);
            $localArray['header']= $headerData;

            $enrolmentData = TableRegistry::getTableLocator()->get('Enrolmentstest')->find()->where(['term_id' => $term->id])
                ->contain(['Users','Childs'])->toArray();

            $localArray['enrolData'] = $enrolmentData;

            foreach($enrolmentData as $enrol){

                $tempHeader = [];
                $enrolInstances = TableRegistry::getTableLocator()->get('enrol')->find()->where(['enrol_id' => $enrol->id])
                    ->contain('lfmclasses')->toArray();

                foreach($enrolInstances as $instance){
                    array_push($tempHeader,date('d/m', strtotime($instance->Lfmclasses['class_date'])));
                }

                array_push($dateHeader,$tempHeader);

            }
            $localArray['dateEnrolled'] = $dateHeader;
            $dataArray[] = $localArray;
        }
        $this->set(compact('dataArray','staticHeader'));
    }

    /**
     * View method
     *
     * @param string|null $id Enrolmentstest id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enrolmentstest = $this->Enrolmentstest->get($id, [
            'contain' => ['Users', 'Childs']
        ]);

        $this->set('enrolmentstest', $enrolmentstest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enrolmentstest = $this->Enrolmentstest->newEntity();
        if ($this->request->is('post')) {
            $enrolmentstest = $this->Enrolmentstest->patchEntity($enrolmentstest, $this->request->getData());
            if ($this->Enrolmentstest->save($enrolmentstest)) {
                $this->Flash->success(__('The enrolmentstest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrolmentstest could not be saved. Please, try again.'));
        }
        $guardians = $this->Enrolmentstest->Users->find('list', ['limit' => 200]);
        $children = $this->Enrolmentstest->Childs->find('list', ['limit' => 200]);
        $this->set(compact('enrolmentstest', 'guardians', 'children'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enrolmentstest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enrolmentstest = $this->Enrolmentstest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enrolmentstest = $this->Enrolmentstest->patchEntity($enrolmentstest, $this->request->getData());
            if ($this->Enrolmentstest->save($enrolmentstest)) {
                $this->Flash->success(__('The enrolmentstest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrolmentstest could not be saved. Please, try again.'));
        }
        $guardians = $this->Enrolmentstest->Users->find('list', ['limit' => 200]);
        $children = $this->Enrolmentstest->Childs->find('list', ['limit' => 200]);
        $this->set(compact('enrolmentstest', 'guardians', 'children'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enrolmentstest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enrolmentstest = $this->Enrolmentstest->get($id);
        if ($this->Enrolmentstest->delete($enrolmentstest)) {
            $this->Flash->success(__('The enrolmentstest has been deleted.'));
        } else {
            $this->Flash->error(__('The enrolmentstest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
