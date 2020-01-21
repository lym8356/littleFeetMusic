<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AboutUs Controller
 *
 * @property \App\Model\Table\AboutUsTable $AboutUs
 *
 * @method \App\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutUsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $aboutUs = $this->paginate($this->AboutUs);

        $this->set(compact('aboutUs'));
    }

    /**
     * View method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);

        $this->set('aboutU', $aboutU);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aboutU = $this->AboutUs->newEntity();
        if ($this->request->is('post')) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('The about u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about u could not be saved. Please, try again.'));
        }
        $this->set(compact('aboutU'));
    }

    /**
     * Edit method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('The about u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about u could not be saved. Please, try again.'));
        }
        $this->set(compact('aboutU'));
    }

    /**
     * Delete method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aboutU = $this->AboutUs->get($id);
        if ($this->AboutUs->delete($aboutU)) {
            $this->Flash->success(__('The about u has been deleted.'));
        } else {
            $this->Flash->error(__('The about u could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
