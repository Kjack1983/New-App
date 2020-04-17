<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RelatedArticles Controller
 *
 * @property \App\Model\Table\RelatedArticlesTable $RelatedArticles
 *
 * @method \App\Model\Entity\RelatedArticle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelatedArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles'],
        ];
        $relatedArticles = $this->paginate($this->RelatedArticles);

        $this->set(compact('relatedArticles'));
    }

    /**
     * View method
     *
     * @param string|null $id Related Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relatedArticle = $this->RelatedArticles->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set('relatedArticle', $relatedArticle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relatedArticle = $this->RelatedArticles->newEntity();
        if ($this->request->is('post')) {
            $relatedArticle = $this->RelatedArticles->patchEntity($relatedArticle, $this->request->getData());
            if ($this->RelatedArticles->save($relatedArticle)) {
                $this->Flash->success(__('The related article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The related article could not be saved. Please, try again.'));
        }
        $articles = $this->RelatedArticles->Articles->find('list', ['limit' => 200]);
        $this->set(compact('relatedArticle', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Related Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relatedArticle = $this->RelatedArticles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatedArticle = $this->RelatedArticles->patchEntity($relatedArticle, $this->request->getData());
            if ($this->RelatedArticles->save($relatedArticle)) {
                $this->Flash->success(__('The related article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The related article could not be saved. Please, try again.'));
        }
        $articles = $this->RelatedArticles->Articles->find('list', ['limit' => 200]);
        $this->set(compact('relatedArticle', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Related Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relatedArticle = $this->RelatedArticles->get($id);
        if ($this->RelatedArticles->delete($relatedArticle)) {
            $this->Flash->success(__('The related article has been deleted.'));
        } else {
            $this->Flash->error(__('The related article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
