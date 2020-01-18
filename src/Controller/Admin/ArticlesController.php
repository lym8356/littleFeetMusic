<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
	{
		$article = $this->Articles->newEntity();
		if ($this->request->is('post')) {
		$article = $this->Articles->patchEntity($article, $this->request->
		˓→getData());
		// Hardcoding the user_id is temporary, and will be removed later
		// when we build authentication out.
		$article->user_id = 67;
		if ($this->Articles->save($article)) {
		$this->Flash->success(__('Your article has been saved.'));
		return $this->redirect(['action' => 'index']);
		}
			$this->Flash->error(__('Unable to add your article.'));
		}
		// Get a list of tags.
		$tags = $this->Articles->Tags->find('list');
		// Set tags to the view context
		$this->set('tags', $tags);
		$this->set('article', $article);
	}
		// Other actions
    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($slug)
	{
		$article = $this->Articles
		->findBySlug($slug)
		->contain('Tags') // load associated Tags
		->firstOrFail();
		if ($this->request->is(['post', 'put'])) {
		$this->Articles->patchEntity($article, $this->request->getData());
		if ($this->Articles->save($article)) {
		$this->Flash->success(__('Your article has been updated.'));
		return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error(__('Unable to update your article.'));
		}
		// Get a list of tags.
		$tags = $this->Articles->Tags->find('list');
		// Set tags to the view context
		$this->set('tags', $tags);
		$this->set('article', $article);
	}

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
