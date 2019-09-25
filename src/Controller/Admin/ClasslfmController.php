<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class ClasslfmController extends AppController{


//    public function beforeFilter(Event $event)
//    {
//        parent::beforeFilter($event);
//
//        $this->viewBuilder()->setLayout('admin');
//    }

    public function add()
    {
        $this->set('title', "Add Class");


        $this->set('class_location', $this->Classlfm->find('all'));

        $class = $this->Classlfm->newEntity();
        if($this->request->is('post') && !empty($this->request->getData()) )
        {
            $class = $this->Classlfm->patchEntity($class, $this->request->getData(), [
                'validate' => true
            ]);

            if($class->errors())
            {
                $this->Flash->error('Please Fill In The Required Fields');
            }else{
                if($this->Classlfm->save($class))
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
        //set title
        $this->set('title', 'Admin Panel');

        //pagination
        $this->paginate=[
            'limit' => '10'
        ];

        $this->paginate = [
            'contain' => ['Location']
        ];

        $class_p = $this->paginate($this->Classlfm->find('all'));
        $this->set('class_p', $class_p);


        //drop down options for location
//        $this->set('location', $this->Classlfm->location->find('list'));
        $this->set('location', $this->Classlfm->location->find('list'));



        $classes = $this->Classlfm->find('all');
        $this->set(compact('classes'));

    }
}


