<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lfmclasses Controller
 *
 * @property \App\Model\Table\LfmclassesTable $Lfmclasses
 *
 * @method \App\Model\Entity\Lfmclass[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LfmclassesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Terms']
        ];

        $lfmclasses = $this->paginate($this->Lfmclasses);

        $this->set(compact('lfmclasses'));
    }

    /**
     * View method
     *
     * @param string|null $id Lfmclass id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lfmclass = $this->Lfmclasses->get($id, [
            'contain' => ['Terms']
        ]);

        $this->set('lfmclass', $lfmclass);
    }
}
