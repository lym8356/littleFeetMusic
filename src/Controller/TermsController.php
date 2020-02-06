<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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
        //$this-> loadComponent('Security');
        $this-> loadComponent('Csrf');
        //$this->Auth->allow('index');
    }

//    public function beforeFilter(Event $event)
//    {
//        parent::beforeFilter($event);
//        $this->Security->config('unlockedActions', ['enrol']);
//    }

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
                foreach($days['terms'] as $key2=>$term){
                    if($term['day_id']==$days['id'] && $location['Id']==$term['location_id']){                        
                        $now = date('dd-mm-yyyy');
                        $lfmdataQuery=TableRegistry::get('Lfmclasses')->find('all',['conditions'=>['Lfmclasses.terms_id'=>$term['id'],"Lfmclasses.class_date>='$now'"]])
                            ->order(['class_date'=>'ASC']);
                        $lfmdata=$lfmdataQuery->limit(1)->first();
                        $class_count =$lfmdataQuery->count();
                        if($class_count>0){
                            $termsArray[$days['name']][$location['name']][$key2]['age_group']=$term['age_group'];
                            $termsArray[$days['name']][$location['name']][$key2]['location_id']=$term['location_id'];
                            $termsArray[$days['name']][$location['name']][$key2]['day_id']=$term['day_id'];
                            $termsArray[$days['name']][$location['name']][$key2]['term_id']=$term['id'];
                            $termsArray[$days['name']][$location['name']][$key2]['start_time']=$term['start_time'];
                            $termsArray[$days['name']][$location['name']][$key2]['end_time']=$term['end_time'];
                            $termsArray[$days['name']][$location['name']][$key2]['start_date']=$term['start_date'];
                            $termsArray[$days['name']][$location['name']][$key2]['casual_rate']=$term['casual_rate'];
                            // $termsArray[$days['loc']][$location['name']]=$term['loc'];
                            // $termsArray[$days['name']][$location['name']][$key2]['day_loc']=$term['loc'];



                            $termsArray[$days['name']][$location['name']][$key2]['price']=$lfmdata['price'];
                            $termsArray[$days['name']][$location['name']][$key2]['remaining_class_count']=$class_count;
                            $termsArray[$days['name']][$location['name']][$key2]['lfm_primary_key']=$lfmdata['id'];
                        }
                    }
                }
            }
        }
        $this->set(compact('termsArray'));
        $this->set(compact('locationData'));
    }
}
