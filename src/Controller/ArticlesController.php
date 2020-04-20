<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\RelatedArticle;
use App\Model\Table\RelatedArticles;
use App\Model\Table\Articles;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Utility\Set;

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

        $archived = array();

        foreach($articles as $row) {
            $archived[] = $row['archived']; 
        }

        $this->set(compact('articles', 'archived'));
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
            'contain' => [],
        ]);

        // fetch  related articles.
        $assocRelatedArticles = $this->Articles->fetchAssocRelatedArticles($id);

        // Set article archive.
        if ($this->request->is('post')) {            
            // set article archive to true. 
            if ($article->archived === false) {
                $article->archived = true;
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('The article has been marked as archived'));
                    $this->rediretToIndexHelper();
                }
            } else {
                $article->archived = false;
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('The article has been marked as unarchived'));
                    $this->rediretToIndexHelper();
                }
            }
        }

        $this->set(compact('article', 'assocRelatedArticles'));
    }

    /**
     * Redirect to index helper method
     */
    private function rediretToIndexHelper() {
        return $this->redirect(['action' => 'index']);
    }

    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
   public function add()
   {
       $article = $this->Articles->newEntity();
       $error = false;

       if ($this->request->is('post')) {

           $article = $this->Articles->patchEntity($article, $this->request->getData());
           
           // Fetch All articles.
           $query = $this->Articles->find('all');
           $duplicateReference = false;

           // Check if has the same reference.
           foreach($query as $key => $row) {
               if(strcmp($row['reference'], $article['reference']) == 0) {
                   $duplicateReference = true;
               }
           }

           // Display error in case of an duplicate reference.
           if ($duplicateReference) {
               $error = $this->Flash->error(__('Duplicate Reference Please try again with a new One.')); //'Duplicate Reference Please try again with a new One.'; 
           } else {
               if ($this->Articles->save($article)) {
                   $this->Flash->success(__('The article has been saved.'));
                   $this->rediretToIndexHelper();
               }
           }
           $this->Flash->error(__('The article could not be saved. Please, try again.'));
       }

       $this->set(
           compact('article', 'error')
       );
   }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);

        //fetch all related articles.
        $relatedArticles = $this->Articles->fetchAllRelatedArticles();
        
        // fetch Associated related articles with an article.
        $assocRelatedArticles = $this->Articles->fetchAssocRelatedArticles($id);
        $selectedArticles = $this->Articles->fetchRelatedArticlesByArticleId($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selectedArticles = $this->request->getData()['Related']['articles'];
            
            $updateMsg = $this->Articles->associateToArticle($selectedArticles, $id);

            if ($updateMsg !== false) {
                $this->Flash->success($updateMsg);
            }

            //@todo Update or insert if article_id is null
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                $this->rediretToIndexHelper();
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set
            (compact(
                'article', 
                'relatedArticles',
                'assocRelatedArticles',
                'selectedArticles'
            )
        );
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
