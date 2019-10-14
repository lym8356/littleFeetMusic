<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class HomeController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('all');
    }

    public function index()
    {


    }

    public function login()
    {

    }

    public function signUp()
    {

    }
}
