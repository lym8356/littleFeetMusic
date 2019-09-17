<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class ClassController extends AppController{


//    public function beforeFilter(Event $event)
//    {
//        parent::beforeFilter($event);
//
//        $this->viewBuilder()->setLayout('admin');
//    }

    public function add()
    {
        $this->set('title', "Add Class");


        $this->set('class_location', $this->Class->find('all'));

        $class = $this->Class->newEntity();
        if($this->request->is('post') AND !empty($this->request->getData()) )
        {
            $class = $this->Class->patchEntity($class, $this->request->getData(), [
                'validate' => true
            ]);

            if($class->errors())
            {
                $this->Flash->error('Please Fill In The Required Fields');
            }else{
                if($this->Class->save($class))
                {
                    $this->redirect('/admin/class/manage');
                    $this->Flash->success('Class Created.');
                }else{
                    $this->Flash->error(_('Failed To Add Class.'));
                }
            }
        }
        $this->set(compact('class'));
        $this->set('_serialize', ['class']);

    }

    public function manage()
    {
        $this->set('title', 'Admin Panel');

        $classes = $this->Class->find('all');
        $this->set(compact('classes'));
    }
}


