<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Terms Controller
 *
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
    public function index()
    {
        $this->paginate= [
            'contain' => ['Locations'],
            'limit' => '10'
        ];

        $terms = $this->paginate($this->Terms);

        $locations = $this->Terms->Locations->find('list');

        $this->set('location',$locations);

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
            'contain' => []
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
            if ($termData=$this->Terms->save($term)) {

                $classInfo = array();
                for($i=0;$i<count($this->request->getData(['week_no']));$i++){
                    $classInfo[$i]['week_no'] = $this->request->getData('week_no')[$i];
                    $classInfo[$i]['price'] = $this->request->getData('price')[$i];
                    $classInfo[$i]['terms_id'] = $termData->id;
                    $classInfo[$i]['class_date'] = date('Y-m-d', strtotime('+'.$this->request->data['week_no'][$i]." week"));
                }
                $lfmclasses = TableRegistry::getTableLocator()->get('Lfmclasses');
                $entities = $lfmclasses->newEntities($classInfo);
                $results = $lfmclasses->saveMany($entities);

                $this->Flash->success(__('The term has been saved.'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The term could not be saved. Please, try again.'));
            }

        }

        $locations = $this->Terms->Locations->find('list', ['limit' => 20]);
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
        $this->set(compact('term'));
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

    public function search()
    {

        $this->layout = 'ajax';
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');
        $query = $this->Terms->find('all',[
            'contain' => ['Locations'],
            'conditions' => ['Terms.age_group LIKE'=>'%'.$keyword.'%'],
            'order' => ['Terms.id'=>'DESC'],
            'limit' => 10
        ]);

        $this->set('terms', $this->paginate($query));
        $this->set('_serialize', ['terms']);
    }

    public function searchLocation(){


        if($this->request->is('ajax')){
            $this->layout = 'ajax';
        }

        //$this->request->allowMethod('ajax');

        $conditions = array();
        $this->paginate = [
            'limit'=>10
        ];
        $keyword = $this->request->getQuery('keyword');
        if(!empty($keyword)){
            $conditions = ['Terms.location_id'=>$keyword];
        }
        $query = $this->Terms->find('all',[
            'contain' => ['Locations'],
            'conditions' => $conditions,
            'order' => ['Terms.id'=>'DESC']
        ]);

        $this->set('terms', $this->paginate($query));
        $this->set('_serialize', ['terms']);
    }
}
