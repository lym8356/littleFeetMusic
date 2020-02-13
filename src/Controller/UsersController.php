<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['signup']);
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
                        }
                        elseif ($this->Auth->user('role') == 'staff'){
                            return $this->redirect('/admin');
                        }
                        elseif ($this->Auth->user('role') == 'teacher'){
                            return $this->redirect('/admin');
                        }
                        else {
                            return $this->redirect($this->Auth->redirectUrl());
                        }
                        //$this->Flash->success('Login Success.', ['key' => 'message']);
                    } else {
                        $this->Flash->error('Email or password is incorrect', ['key' => 'message']);
                    }
                }
            }
            $this->set('login', $login);
        }

    }

    public function signup()
    {
        $sign_up = $this->Users->newEntity();

        if ($this->request->is('POST') AND !empty($this->request->getData())) {
            $signup = $this->Users->patchEntity($sign_up, $this->request->getData(),
                [
                    'validate' => 'update'
                ]);
            if ($signup->errors()) {
                $this->Flash->error('Please Fill in the required fields', ['key' => 'message']);
            } else {

                $sign_up->name = $this->request->getData('name');
//                $sign_up->username = $this->request->getData('username');
                $sign_up->password = $this->request->getData('password');
                $sign_up->email = $this->request->getData('email');
                $sign_up->phone = $this->request->getData('phone');
                $sign_up->postcode = $this->request->getData('postcode');
                $sign_up->role = 'user';

                if ($this->Users->save($sign_up)) {
                    $this->Flash->success('You have signed up successfully!',
                        ['key' => 'message']);
                    return $this->redirect(['action' => 'Login']);
                }
                $this->Flash->error(_('Sign Up Failed, Please try again later! ', ['key' => 'message']));
            }
        }
        $this->set('sign_up', $sign_up);
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
                    $this->request->getSession()->write('Auth.User.postcode', $user_data['postcode']);
                    $this->request->getSession()->write('Auth.User.birthday', $user_data['birthday']);
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

    public function forgotpassword()
    {

        if ($this->request->is('post')) {
            $myemail = $this->request->getData('email');
            $mytoken = Security::hash(Security::randomBytes(25));
            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['email' => $myemail])->first();
            $user->token = $mytoken;
            if ($userTable->save($user)) {
                $this->Flash->success('Reset password link has been sent to your email(' . $myemail . '). please open your inbox');


                TransportFactory::setConfig('gmail', [
                    'host' => 'mail.dreamfactorymusic.com.au',
                    'port' => 465,
                    'username' => '_mainaccount@dreamfactorymusic.com.au',
                    'password' => 'Z9.3TDQg2(pq9q',
                    'className' => 'Smtp'
                ]);

                $email = new Email('default');
                $email->setTransport('gmail');

                $success = $email->setFrom(['ieteam116@gmail.com' => 'pony music'])
                    ->setTo($myemail)
                    ->setEmailFormat('html')
                    ->setSubject('please reset your password')
                    ->send('Hello, ' . $myemail . '<br/> please click this link to reset your password<br/> <a href="../users/reset_password/' . $mytoken . '">Reset Password</a>');

                if ($success) {
                    $this->Flash->success('Reset password link has been sent to your email(' . $myemail . '). please open your inbox');
                } else {
                    $this->Flash->error('Could not send email');
                }
            }

        }
    }

    public function resetpassword($token)
    {

        if ($this->request->is('post')) {
            $mypass = $this->request->getdata('password');
            $usertable = TableRegistry::get('Users');
            $user = $usertable->find('all')->where(['token' => $token])->first();

            $user->password = $mypass;
            if ($usertable->save($user)) {
                return $this->redirect(['action' => 'login']);
            }


        }
    }

}
