<?php
namespace App\Controller;
use App\Controller\AppController;

/**
 * About Controller
 *
 * @property \App\Model\Table\AboutTable $About
 *
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class AboutController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $about = $this->paginate($this->About);

        $this->set(compact('about'));
    }
    /**
     * View method
     *
     * @param string|null $id About id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $about = $this->About->get($id, [
            'contain' => []
        ]);

        $this->set('about', $about);
    }
}


?>