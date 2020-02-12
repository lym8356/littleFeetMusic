<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Client Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
//This code will search the table for users with role = "user" and select them from search
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->find('all',['conditions'=>['Users.role="user"']]);
        $users = $this->paginate($user);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->newEntity();
        if ($this->request->is('post')) {
            $user = $userTable->patchEntity($user, $this->request->getData());
            if ($userTable->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $userTable->patchEntity($user, $this->request->getData());
            if ($userTable->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        if ($this->Auth->user('role') == 'admin') {
            $this->request->allowMethod(['post', 'delete']);
            $user = $userTable->get($id);
            if ($userTable->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        }
        else {
            $this->Flash->error(__('The user does not have admin privileges.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        $this->Flash->error(__('The user session timed out!'));
        return $this->redirect(['controller' => '../Home', 'action' => 'index']);
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }
}
