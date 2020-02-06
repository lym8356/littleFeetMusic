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

        $dataArray = [];
        $dayVariable = $this->request->getQuery('dayID') ;

        $termsData = TableRegistry::getTableLocator()->get('Terms')->find()->where(['day_id' =>$dayVariable])->contain(['Days','Lfmclasses'])->toArray();
        $staticHeader = ['Child’s name','Adult','DOB', 'Phone', 'Comments'];
        foreach($termsData as $key1=>$term){
            $localArray=[];
            $localTermArray = array(
                "Age group" => $term->age_group,
                "Day" => $term->day->name,
                "Time" => date("G:i", strtotime($term->start_time))."-".date("G:i", strtotime($term->end_time)),
                "Price" => "$".$term->lfmclasses[0]->price
            );

            $localArray['termData'] = $localTermArray;
            $lfmclassesid = array_map(function($e) {
                return is_object($e) ? $e->id : $e['id'];
            }, $term['lfmclasses']);

            $lfmDynamicHeader = array_map(function($e) {
                return is_object($e) ? date('d/m',strtotime($e->class_date)) :date('d/m',strtotime($e['class_date']));
            }, $term['lfmclasses']);

            $staticHeader=['Child’s name','Adult','DOB', 'Phone', 'Comments'];

            $headerData=array_merge($staticHeader,$lfmDynamicHeader);


            $localArray['header']=$headerData;


            $enrolment=TableRegistry::get('Enrolments')->find('all',['conditions'=>['Enrolments.lfmclasses_id IN'=>$lfmclassesid]])->
            contain(['Users','Childs'])->toArray();

            if(sizeof($enrolment)>0){
                $enrolmentData = [];
                array_push($enrolmentData,$enrolment[0]);
                $temp = $enrolment[0]['child_id'];

                foreach($enrolment as $e){
                    if($e->child_id == $temp){
                        continue;
                    }else{
                        array_push($enrolmentData,$e);
                        $temp = $e->child_id;
                    }
                }
                $localArray['enrolment'] = $enrolmentData;
            }else{
                $enrolmentData = $enrolment;
                $localArray['enrolment']=$enrolmentData;
            }

            $localArray['header']=$headerData;


            $dataArray[]=$localArray;

        }

        $enrolments = $this->paginate($this->Enrolments);

        $this->set(compact('enrolments','dataArray','staticHeader'));
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
