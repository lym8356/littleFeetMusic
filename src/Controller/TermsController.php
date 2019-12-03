<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Terms Controller
 *
 * @property \App\Model\Table\TermsTable $Terms
 *
 * @method \App\Model\Entity\Term[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TermsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('index');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $terms = $this->paginate($this->Terms);

        $this->set(compact('terms'));
    }

    /**
     * View method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $term = $this->Terms->get($id, [
            'contain' => ['Locations', 'Lfmclasses']
        ]);

        $this->set('term', $term);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $term = $this->Terms->newEntity();
        if ($this->request->is('post')) {
            $term = $this->Terms->patchEntity($term, $this->request->getData());
            if ($this->Terms->save($term)) {
                $this->Flash->success(__('The term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The term could not be saved. Please, try again.'));
        }
        $locations = $this->Terms->Locations->find('list', ['limit' => 200]);
        $this->set(compact('term', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $term = $this->Terms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $term = $this->Terms->patchEntity($term, $this->request->getData());
            if ($this->Terms->save($term)) {
                $this->Flash->success(__('The term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The term could not be saved. Please, try again.'));
        }
        $locations = $this->Terms->Locations->find('list', ['limit' => 200]);
        $this->set(compact('term', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $term = $this->Terms->get($id);
        if ($this->Terms->delete($term)) {
            $this->Flash->success(__('The term has been deleted.'));
        } else {
            $this->Flash->error(__('The term could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enrolInfo(){

        $terms=$this->Terms->find('all')->group('Terms.day_id')->contain(['Locations'])->matching('Lfmclasses', function(\Cake\ORM\Query $q) {
            $now = date('Y-m-d');
            return $q->where(["Lfmclasses.class_date>='$now'"]);
        });
        $terms = $this->paginate($terms);

        $daysData=TableRegistry::get('Days')->find('all')->contain(['Terms.Locations'])->group('Days.id')->matching('Terms', function(\Cake\ORM\Query $q) {
            return $q->group(["Terms.Locations.id"]);
        })->toArray();
        $locationData=TableRegistry::get('Locations')->find('all')->contain('Terms')->group('Locations.id')->toArray();
        $termsArray=[];

        foreach($daysData as $key=>$days){

            foreach($locationData as $key1=>$location){

                foreach($location['terms'] as $key2=>$term){
                    if($term['day_id']==$days['id'] && $location['Id']==$term['location_id']){
                        $termsArray[$days['name']][$location['name']][$key2]['age_group']=$term['age_group'];
                        $termsArray[$days['name']][$location['name']][$key2]['location_id']=$term['location_id'];
                        $termsArray[$days['name']][$location['name']][$key2]['day_id']=$term['day_id'];
                        $termsArray[$days['name']][$location['name']][$key2]['term_id']=$term['id'];
                        $termsArray[$days['name']][$location['name']][$key2]['start_time']=$term['start_time'];
                        $termsArray[$days['name']][$location['name']][$key2]['start_date']=$term['start_date'];

                        $now = date('Y-m-d');
                        $lfmdataQuery=TableRegistry::get('Lfmclasses')->find('all',['conditions'=>['Lfmclasses.terms_id'=>$term['id'],"Lfmclasses.class_date>='$now'"]])
                            ->order(['class_date'=>'ASC']);
                        $lfmdata=$lfmdataQuery->limit(1)->first();
                        $class_count =$lfmdataQuery->count();
                        $termsArray[$days['name']][$location['name']][$key2]['price']=$lfmdata['price'];
                        $termsArray[$days['name']][$location['name']][$key2]['remaining_class_count']=$class_count;

                    }
                }
            }
        }
        $this->set(compact('termsArray'));
    }

    public function enrol(){

        if($this->request->is('ajax')){
            $data = $this->request->input('json_decode');
        }
        $enrolment = TableRegistry::getTableLocator()->get('Enrolments');
        $enrolment_entity = $enrolment->newEntity();
        if ($this->request->is('post')) {
            $enrolment = $this->Enrolments->patchEntity($enrolment, $this->request->getData());
            if ($this->Enrolments->save($enrolment)) {
                //$this->Flash->success(__('One has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The lfmclass could not be saved. Please, try again.'));
        }
        //$terms = $this->Lfmclasses->Terms->find('list', ['limit' => 200]);
        //$this->set(compact('lfmclass', 'terms'));
    }


}
