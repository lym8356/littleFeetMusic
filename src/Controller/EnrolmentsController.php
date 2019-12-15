<?php
namespace App\Controller;

use App\Controller\AppController;
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
            'contain' => ['Terms']
        ];
        $enrolments = $this->paginate($this->Enrolments);

        $this->set(compact('enrolments'));
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
            'contain' => ['Terms']
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
        if((!empty($this->request->getQuery('term_id')))){
            $requestdata = $this->request->getQuery('term_id');
            $termsArray=explode("-",$requestdata);

            $termid=$termsArray[0];
            $lfmid=$termsArray[1];
            $termData=TableRegistry::get('Terms')->find('all',['conditions'=>['Terms.id'=>$termid]])->contain('Locations')->first();

            $lfmData=TableRegistry::get('Lfmclasses')->find('all',['conditions'=>['Lfmclasses.id'=>$lfmid]])->first();
            $this->request->data['price'] = $lfmData['price'];
            $this->request->data['class_time'] = date("G:i", strtotime($termData['start_time']));
            $this->request->data['location'] = $termData['location']['name'];
            $this->request->data['age_group'] = $termData['age_group'];
            $this->request->data['term_id'] = $termid;
        }else{

            pr($this->request->getData());die;
            $userArray = array();
            $userArray['f_name'] = $this->request->getData(['user_first_name']);
            $userArray['l_name'] = $this->request->getData(['user_last_name']);
            $userArray['birthday'] = $this->request->getData(['user_dob']);
            $userArray['email'] = $this->request->getData(['user_email']);
            $userArray['phone'] = $this->request->getData(['user_phone']);
            $userArray['postcode'] = $this->request->getData(['user_postcode']);

            $usersTable = TableRegistry::getTableLocator()->get('users');
            $user_entity = $usersTable->newEntity($userArray);
            $user_results = $usersTable->save($user_entity);
            //$user_results->id;

            $childArray = array();
            for($i=0;$i<count($this->request->getData(['child_first_name']));$i++){
                $childArray[$i]['first_name'] = $this->request->getData(['child_first_name'])[$i];
                $childArray[$i]['last_name'] = $this->request->getData(['child_last_name'])[$i];
                $childArray[$i]['dob'] = $this->request->getData(['child_DOB'])[$i];
                $childArray[$i]['note'] = $this->request->getData(['child_note'])[$i];

            }



            $enrolment = $this->Enrolments->newEntity();
            $this->set(compact('enrolment'));
        }


//        ajay.rawal@monash.edu
//        if ($this->request->is('ajax')) {
//            $enrolment = $this->Enrolments->patchEntity($enrolment, $this->request->getData());
//            if ($this->Enrolments->save($enrolment)) {
                //$this->Flash->success(__('The enrolment has been saved.'));

                //return $this->redirect(['action' => 'index']);
//            }
//        }
        //$terms = $this->Enrolments->Terms->find('list', ['limit' => 200]);
        //$this->set(compact('enrolment', 'terms'));

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
        $terms = $this->Enrolments->Terms->find('list', ['limit' => 200]);
        $this->set(compact('enrolment', 'terms'));
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
