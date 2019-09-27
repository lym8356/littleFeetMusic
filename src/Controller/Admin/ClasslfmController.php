<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Classlfm Controller
 *
 *
 * @method \App\Model\Entity\Classlfm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClasslfmController extends AppController
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
        $classlfm = $this->paginate($this->Classlfm);

        $this->set(compact('classlfm'));
    }

    /**
     * View method
     *
     * @param string|null $id Classlfm id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

   public function view($id = null)
   {
       $classlfm = $this->Classlfm->get($id, [
           'contain' => ['Location']
       ]);

       $this->set('classlfm', $classlfm);
   }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classlfm = $this->Classlfm->newEntity();
        if ($this->request->is('post')) {
            $classlfm = $this->Classlfm->patchEntity($classlfm, $this->request->getData());
            if ($this->Classlfm->save($classlfm)) {
                $this->Flash->success(__('The classlfm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classlfm could not be saved. Please, try again.'));
        }
        $locations = $this->Classlfm->Locations->find('list', ['limit' => 200]);
        $this->set(compact('classlfm', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classlfm id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classlfm = $this->Classlfm->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classlfm = $this->Classlfm->patchEntity($classlfm, $this->request->getData());
            if ($this->Classlfm->save($classlfm)) {
                $this->Flash->success(__('The classlfm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classlfm could not be saved. Please, try again.'));
        }
        $locations = $this->Classlfm->Locations->find('list', ['limit' => 200]);
        $this->set(compact('classlfm', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classlfm id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classlfm = $this->Classlfm->get($id);
        if ($this->Classlfm->delete($classlfm)) {
            $this->Flash->success(__('The classlfm has been deleted.'));
        } else {
            $this->Flash->error(__('The classlfm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
