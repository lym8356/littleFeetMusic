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
//        $childTable = TableRegistry::getTableLocator()->get('Childs');
//        $child = $childTable->find('all', ['contain' => ['Users', 'Enrolments']]);
//        $this->set('childs', $child);
//        $relationTable = TableRegistry::getTableLocator()->get('Users_Childs');
//        $relation = $relationTable->find('all', ['contain' => ['Users', 'Enrolments']]);
//        $user_child_data=TableRegistry::getTableLocator()->get('users_childs')->find('all',
//            ['conditions'=>['users_childs.user_id'=>$user_id]])->toArray();
//        $enrolmentdata=[];
//        foreach($user_child_data as $userchild){
//            $enrolmetTable=TableRegistry::getTableLocator()->get('enrolments');
//            $enrolmentdata['lfmclasses_id']=$lfm->id;
//            $enrolmentdata['guardian_id']=$user_id;
//            $enrolmentdata['enrolment_cost']=$price;
//            $enrolmentdata['child_id']=$userchild->child_id;
//            $enrolmententity = $enrolmetTable->newEntity($enrolmentdata);
//            $enrolmetTable->save($enrolmententity);
//        }

    }

    /**
     * Export to CSV method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function exporttocsv()
    {
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->find('all',['conditions'=>['Users.role="user"']]);
//        $users = $this->Enrolments->Users->find('list', ['limit' => 200]);
//        $user->set('headers',$user->Result->find('all',array('fields'=>'Result.label')));
//        $user->set('values',$user->Result->find('all',array('fields'=>'Result.value')));
//        $user->set('headers',$user->find('all',['contain' => ['Users', 'Enrolments']]));
//        $user->set('values',$user->find('all',array('fields'=>'Result.value')));
    }


    /**
     * Export to XLS method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function export()
    {
        $data='';
        $data ='<table cellspacing="2" cellpadding="5" style="border:2px;text-align:center;" border="1" width="60%">';

        $data .= '<tr>
                    <th style="text-align:center;">Guardians First Name</th>
                    <th style="text-align:center;">Guardians Last Name</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Phone</th>
                    <th style="text-align:center;">Postcode</th>
		        </tr>';

        $userTable = TableRegistry::getTableLocator()->get('Users');
//        $user = $userTable->find('all',['conditions'=>['Users.role="user"']]);
        $user = $userTable->find('all',['conditions'=>['Users.role="user"']])->toArray();
        foreach($user as $users) {
            $fname = $users['f_name'];
            $lname = $users['l_name'];
            $email = $users['email'];
            $phone = $users['phone'];
            $postcode = $users['postcode'];
            $data .= '<tr>
                    <td style="text-align:center;">'.$fname.'</td>
                    <td style="text-align:center;">'.$lname.'</td>
                    <td style="text-align:center;">'.$email.'</td>
                    <td style="text-align:center;">'.$phone.'</td>
                    <td style="text-align:center;">'.$postcode.'</td>
		        </tr>';
//            pr($fname.' '.$lname);
//            pr($users);
        }
        $data .= "</table>";
        //EXCEL EXPORT FUNCTION
        header('Content-Type: application/force-download');
            header('Content-disposition: attachment; filename = client_data.xls');
            header('Pragma: ');
            header("Cache-Control: ");
            echo $data;
            die;
//        $users = $this->Enrolments->Users->find('list', ['limit' => 200]);
//        $user->set('headers',$user->Result->find('all',array('fields'=>'Result.label')));
//        $user->set('values',$user->Result->find('all',array('fields'=>'Result.value')));
//        $user->set('headers',$user->find('all',['contain' => ['Users', 'Enrolments']]));
//        $user->set('values',$user->find('all',array('fields'=>'Result.value')));
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


}
