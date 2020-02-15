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


    }


    public function tab(){
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
            $localArray['term_id'] = $term->id;

            $dateDynamicHeader = array_map(function($e) {
                return is_object($e) ? date('d/m',strtotime($e->class_date)) :date('d/m',strtotime($e['class_date']));
            }, $term['lfmclasses']);

            $staticHeader=['Child’s name','Adult','DOB', 'Phone', 'Comments', 'Enrolment Type' , 'Enrolment Cost','Payment Type', 'Payment Status'];
            $headerData=array_merge($staticHeader,$dateDynamicHeader);
            $localArray['header']= $headerData;


            $enrolmentData = TableRegistry::getTableLocator()->get('Enrolments')->find()->where(['term_id' => $term->id])
                ->contain(['Users','Childs'])->toArray();


            $localArray['enrolData'] = $enrolmentData;

            foreach($enrolmentData as $enrol){

                $tempHeader = [];
                $enrolInstances = TableRegistry::getTableLocator()->get('Enrols')->find()->where(['enrolment_id' => $enrol->id])
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
        $users = $this->Enrolments->Users->find('list', ['limit' => 200]);
        $childs = $this->Enrolments->Childs->find('list', ['limit' => 200]);
        $this->set(compact('enrolment','users', 'childs'));
    }

    private function saveTermEnrolment($enrol_id, $term_id){

        $now = date('Y-m-d');
        $lfmdataQuery=TableRegistry::getTableLocator()->get('Lfmclasses')->find('all',
            ['conditions'=>['Lfmclasses.terms_id'=>$term_id,"Lfmclasses.class_date>='$now'"]])
            ->order(['class_date'=>'ASC'])->toArray();


        foreach($lfmdataQuery as $lfm){
            $enrolTable = TableRegistry::getTableLocator()->get('Enrols');

            $enrolArray=[];
            $enrolArray['enrolment_id'] = $enrol_id;
            $enrolArray['lfmclass_id'] = $lfm['id'];
            $enrolArray['attendance'] = 'unknown';

            $enrol_entity = $enrolTable->newEntity($enrolArray);
            $enrol_result = $enrolTable->save($enrol_entity);
        }
    }

    private function saveCasualEnrolment($enrol_id, $term_id, $dateArray){

        for($i=0;$i<sizeof($dateArray);$i++){

            $formattedDate = date('Y-m-d', strtotime(str_replace('/', '-', $dateArray[$i])));

            $lfmdataQuery=TableRegistry::getTableLocator()->get('Lfmclasses')->find('all',
                ['conditions'=>['Lfmclasses.class_date'=>$formattedDate, 'Lfmclasses.terms_id'=>$term_id]])->first()->toArray();


            $enrolTable = TableRegistry::getTableLocator()->get('Enrols');
            $enrolArray=[];
            $enrolArray['enrolment_id'] = $enrol_id;
            $enrolArray['lfmclass_id'] = $lfmdataQuery['id'];
            $enrolArray['attendance'] = 'unknown';

            $enrol_entity = $enrolTable->newEntity($enrolArray);
            $enrol_result = $enrolTable->save($enrol_entity);
        }

    }

    public function addTerm(){

        if($this->request->is('ajax')){
            $this->layout = 'ajax';
        }
        if(($this->request->is('get'))&&(!empty($this->request->getQuery('term_id')))){
            $termid = $this->request->getQuery('term_id');

            $termData=TableRegistry::get('Terms')->find('all',
                ['conditions'=>['Terms.id'=>$termid]])->contain('Locations')->first();

            $now = date('dd-mm-yyyy');
            $lfmdataQuery=TableRegistry::getTableLocator()->get('Lfmclasses')->find('all',['conditions'=>['Lfmclasses.terms_id'=>$termid,"Lfmclasses.class_date>='$now'"]])
                ->order(['class_date'=>'ASC']);
            $lfmData = $lfmdataQuery->limit(1)->first();

            $this->request->data['price'] = $lfmData['price'];
            $this->request->data['class_time'] = date("G:i", strtotime($termData['start_time'])).'-'.
                date("G:i", strtotime($termData['end_time']));
            $this->request->data['location'] = $termData['location']['street_address'].', '.$termData['location']['name'];
            $this->request->data['age_group'] = $termData['age_group'];
            $this->request->data['term_id'] = $termid;
        }else {
            if ($this->request->is('post')){

                $formData = $this->request->getData();
                $userArray = array();
                $userArray['f_name'] = $formData['user_first_name'];
                $userArray['l_name'] = $formData['user_last_name'];
                $userArray['email'] = $formData['user_email'];
                $userArray['phone'] = $formData['user_phone'];
                $userArray['postcode'] = $formData['user_postcode'];

                $usersTable = TableRegistry::getTableLocator()->get('users');
                $user_entity = $usersTable->newEntity($userArray);
                $user_results = $usersTable->save($user_entity);

                $childArray = array();
                for ($i = 0; $i < count($formData['child_first_name']); $i++) {

                    $childTable = TableRegistry::getTableLocator()->get('childs');
                    $childArray['first_name'] = $formData['child_first_name'][$i];
                    $childArray['last_name'] = $formData['child_last_name'][$i];
                    $childArray['dob'] = date("Y-m-d", strtotime($formData['child_dob'][$i]));
                    $childArray['note'] = $formData['child_note'][$i];

                    $child_entity = $childTable->newEntity($childArray);
                    $child_results = $childTable->save($child_entity);

                    $user_child_relation = [];
                    $user_child_relation['user_id'] = $user_results->id;
                    $user_child_relation['child_id'] = $child_results->id;
                    $user_child_relation['relationship'] = $formData['relation'];

                    $user_childTable = TableRegistry::getTableLocator()->get('users_childs');
                    $user_child_entity = $user_childTable->newEntity($user_child_relation);
                    $user_child_result = $user_childTable->save($user_child_entity);

                    $enrolmentArray = [];
                    $enrolmentArray['term_id'] = $formData['term_id'];
                    $enrolmentArray['enrolment_cost'] = $formData['price'];
                    $enrolmentArray['guardian_id'] = $user_results->id;
                    $enrolmentArray['child_id'] = $child_results->id;
                    $enrolmentArray['enrolment_type'] = 'Term';
                    $enrolmentArray['payment_method'] = $formData['payment_method'];
                    $enrolmentArray['payment_status'] = $formData['payment_status'];
                    $enrolmentArray['comment'] = '';

                    $enrolment_entity = $this->Enrolments->newEntity($enrolmentArray);
                    $enrolment_result = $this->Enrolments->save($enrolment_entity);

                    $this->saveTermEnrolment($enrolment_result->id, $formData['term_id']);
                }
                //$this->Flash->success(__('Enrolment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function addCasual(){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
        }
        if(($this->request->is('get'))&&(!empty($this->request->getQuery('term_id')))){
            $requestTermID = $this->request->getQuery('term_id');
            $now = date('Y-m-d');
            $conditions = array(
                'Lfmclasses.terms_id' => $requestTermID,
                "Lfmclasses.class_date>='$now'"
            );

            $lfmdata = TableRegistry::get('Lfmclasses')->find('all',['conditions' => $conditions]);

            $this->set('classData',$lfmdata);

            $termData=TableRegistry::get('Terms')->find('all',['conditions'=>['Terms.id'=>$requestTermID]])->contain('Locations')->first();

            $this->request->data['price'] = $termData['casual_rate'];
            $this->request->data['class_time'] = date("G:i", strtotime($termData['start_time'])).'-'.date("G:i", strtotime($termData['end_time']));
            $this->request->data['location'] = $termData['location']['street_address'].', '.$termData['location']['name'];
            $this->request->data['age_group'] = $termData['age_group'];
            $this->request->data['term_id'] = $requestTermID;
        }else {
            if ($this->request->is('post')){

                $formData = $this->request->getData();

                $userArray = array();
                $userArray['f_name'] = $formData['user_first_name'];
                $userArray['l_name'] = $formData['user_last_name'];
                $userArray['email'] = $formData['user_email'];
                $userArray['phone'] = $formData['user_phone'];
                $userArray['postcode'] = $formData['user_postcode'];

                $usersTable = TableRegistry::getTableLocator()->get('users');
                $user_entity = $usersTable->newEntity($userArray);
                $user_results = $usersTable->save($user_entity);

                $childArray = array();
                for($i=0;$i<count($formData['child_first_name']);$i++){

                    $childTable = TableRegistry::getTableLocator()->get('childs');
                    $childArray['first_name'] = $formData['child_first_name'][$i];
                    $childArray['last_name'] = $formData['child_last_name'][$i];
                    $childArray['dob'] = date("Y-m-d",strtotime($formData['child_dob'][$i]));
                    $childArray['note'] = $formData['child_note'][$i];

                    $child_entity = $childTable->newEntity($childArray);
                    $child_results = $childTable->save($child_entity);

                    $user_child_relation=[];
                    $user_child_relation['user_id']=$user_results->id;
                    $user_child_relation['child_id']=$child_results->id;
                    $user_child_relation['relationship']=$formData['relation'];

                    $user_childTable = TableRegistry::getTableLocator()->get('users_childs');
                    $user_child_entity = $user_childTable->newEntity($user_child_relation);
                    $user_child_result = $user_childTable->save($user_child_entity);

                    $enrolmentArray=[];
                    $termInfo = TableRegistry::getTableLocator()->get('Terms')->find('all',['conditions'=>['id'=>$formData['term_id']]])->first();

                    $enrolmentArray['enrolment_cost'] = $termInfo->casual_rate * sizeof($formData['date']);
                    $enrolmentArray['term_id'] = $formData['term_id'];
                    $enrolmentArray['guardian_id'] = $user_results->id;
                    $enrolmentArray['child_id'] = $child_results->id;
                    $enrolmentArray['enrolment_type'] = 'Casual';
                    $enrolmentArray['payment_method'] = $formData['payment_method'];
                    $enrolmentArray['payment_status'] = $formData['payment_status'];
                    $enrolmentArray['comment'] = '';

                    $enrolment_entity = $this->Enrolments->newEntity($enrolmentArray);
                    $enrolment_result = $this->Enrolments->save($enrolment_entity);


                    $this->saveCasualEnrolment($enrolment_result->id, $formData['term_id'], $formData['date']);
                }
                //$this->Flash->success(__('Enrolment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
        }

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
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);

        $id = $this->request->getData('id');
        $enrolment = $this->Enrolments->get($id);
        if ($this->Enrolments->delete($enrolment)) {
            //$this->Flash->success(__('The enrolment has been deleted.'));
        } else {
            //$this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
