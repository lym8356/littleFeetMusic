<?php
namespace App\Controller;


class UsersController extends AppController
{

    public function login()
    {

        $login = $this->Users->newEntity();

        if($this->request->is('POST') AND !empty($this->request->getData()) )
        {
            $login_check = $this->Users->patchEntity($login, $this->request->getData(),
                [
                    'validate' => 'login'
                ]);
            if($login_check->errors())
            {
                $this->Flash->error('Please Fill in the required fields', ['key' => 'message']);
            }else {

            }
        }
        $this->set('login', $login);
    }

    public function signup()
    {
        $sign_up = $this->Users->newEntity();

        if($this->request->is('POST') AND !empty($this->request->getData()) )
        {
            $signup = $this->Users->patchEntity($sign_up, $this->request->getData(),
                [
                    'validate' => 'update'
                ]);
            if($signup->errors())
            {
                $this->Flash->error('Please Fill in the required fields', ['key' => 'message']);
            }else{

                if($this->Users->save($sign_up))
                {
                    $this->Flash->success('You have signed up successfully!',
                        ['key' => 'message']);
                    return $this->redirect(['action' => 'Login']);
                }
                $this->Flash->error(_('Sign Up Failed, Please try again later! '));
            }
        }
        $this->set('sign_up', $sign_up);
    }

}
