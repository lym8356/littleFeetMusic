<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

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
        $user = $this->Users->get($id, [
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {

        if ($this->Auth->user('id')) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {

            $login = $this->Users->newEntity();
            if ($this->request->is('POST') AND !empty($this->request->getData())) {
                $login_check = $this->Users->patchEntity($login, $this->request->getData(),
                    [
                        //'validate' => 'login'
                    ]);
                if ($login_check->errors()) {
                    $this->Flash->error('Please Fill in the required fields', ['key' => 'message']);
                } else {
                    $user = $this->Auth->identify();
                    if ($user) {
                        $this->Auth->setUser($user);

                        if ($this->Auth->user('role') == 'admin') {
                            return $this->redirect('/admin');
                        } else {
                            return $this->redirect($this->Auth->redirectUrl());
                        }
                        //$this->Flash->success('Login Success.', ['key' => 'message']);
                    } else {
                        $this->Flash->error('Username or password is incorrect', ['key' => 'message']);
                    }
                }
            }
            $this->set('login', $login);
        }

    }

    public function profile()
    {
        $this->set('title', 'User Profile');
        $this->viewBuilder()->setLayout('user');

        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        //User Profile Update
        $Users = TableRegistry::getTableLocator()->get('Users');
        $user_data = $this->Users->get($this->request->getSession()->read('Auth.User.id'));

        if ($this->request->is('PUT') AND !empty($this->request->getData())) {
            $userdata = $this->Users->patchEntity($user_data, $this->request->getData(),
                [
                    'validate' => 'update_profile'
                ]);
            if ($userdata->errors()) {
                $this->Flash->error('Please Fill in the required fields', ['key' => 'message']);
            } else {

                if ($this->Users->save($user_data)) {
                    $this->request->getSession()->write('Auth.User.name', $user_data['name']);
                    $this->request->getSession()->write('Auth.User.email', $user_data['email']);
                    $this->request->getSession()->write('Auth.User.phone', $user_data['phone']);
                    $this->request->getSession()->write('Auth.User.zipcode', $user_data['zipcode']);
                    $this->request->getSession()->write('Auth.User.birthdate', $user_data['birthdate']);
                    $this->redirect('/User/Profile');
                    $this->Flash->success('User Profile Has Been Updated.');
                } else {
                    $this->Flash->error(_('Unable To Update User'));
                }
            }
        }
        $this->set(compact('user_data'));
        $this->set('_serialize', ['user_data']);
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }
}
