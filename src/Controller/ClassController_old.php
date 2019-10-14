<?php


namespace App\Controller;

use Cake\Event\Event;
use http\Client\Curl\User;

class ClassController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('user');
    }

    public function view()
    {
        $this->set('title', 'View Booking');

    }

    public function add()
    {

    }

    public function edit()
    {

    }
    public function enroll(){

    }


}
