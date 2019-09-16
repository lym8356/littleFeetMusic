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

        $class = $this->Class->newEntity();
        if($this->request->is('post') AND !empty($this->request->getData()) )
        {
            $class = $this->Class->patchEntity($class, $this->request->getData(), [
                'validate' => true
            ]);
        }

    }

    public function manage()
    {
        $this->set('title', 'Admin Panel');

        $classes = $this->Class->find('all');
        $this->set(compact('classes'));
    }
}


