<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Utility;

/**
 * Articles Model
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('relatedArticles', array(
            'foreignKey' => 'article_id'
        ));
    }

    /**
     * Fetch all related articles from article Id.
     *
     * @param [integer] $id
     * @return [Array] $related_articles_by_id
     */
    public function fetchAssocRelatedArticles($id = null) {
        $relatedArticlesTable = TableRegistry::get('related_articles');
        
        $query = $relatedArticlesTable
                    ->find()
                    ->select(['id','title', 'created','body'])
                    ->where(['articles_id' => $id]);

        $related_articles_by_id = array(); 

        foreach ($query as $row) {
            $related_articles_by_id[] = $row;
        }

        return $related_articles_by_id;
    }

    /**
     * Associate related articles with an Article (Update).
     * Alternative way of updating below:
     * $relatedArticlesTable->update()->set(['article_id' => $id])->where(['article_id' => $id])->execute();
     *
     * @param array $data
     * @param [integer] $id
     * @return [string] $errorMsg
     */
    public function associateToArticle($data = array(), $id = null) {
        //$relatedArticlesTable = TableRegistry::get('related_articles');
        $relatedArticlesTable = TableRegistry::getTableLocator()->get('related_articles');
        $errorMsg = false;

        foreach($data as $related_id) {
            $article = $relatedArticlesTable->get($related_id);
            $article->articles_id = $id;
            if ($relatedArticlesTable->save($article)) {
                $errorMsg = 'Related Articles have been successfully updated';
            } else {
                $errorMsg = "Something went wrong related articles didn't update";
            }
        }
        return $errorMsg;
    }

    /**
     * Fetch related related articles attached in an article
     *
     * @param [type] $id
     * @return [Array] $relatedArticles
     */
    public function fetchRelatedArticlesByArticleId($id = null) {
        $relatedArticlesTable = TableRegistry::get('related_articles');

        $query = $relatedArticlesTable
                    ->find()
                    ->select(['id'])
                    ->where(['articles_id' => $id]);

        $fetchedRelatedArticles = array();

        foreach ($query as $row) {
            array_push($fetchedRelatedArticles, $row);
        }

        $relatedArticles = array_reduce($fetchedRelatedArticles, function ($article, $row) {
            $article[] = $row['id'];
            return $article;
        }, []);

        return $relatedArticles;
    }

    /**
     * Fetch all related articles
     *
     * @return [Array] $allRelatedArticles
     */
    public function fetchAllRelatedArticles() {
        $relatedArticlesTable = TableRegistry::get('related_articles');

        $allRelatedArticles = array();

        $query = $relatedArticlesTable->find('list', array('fields' => array('id', 'title')));

        foreach ($query as $row) {
            array_push($allRelatedArticles, $row);
        }

        return $allRelatedArticles;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmptyString('body');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 255)
            ->requirePresence('reference', 'create')
            ->notEmptyString('reference');

        $validator
            ->boolean('archived')
            ->requirePresence('archived', 'create')
            ->notEmptyString('archived');

        return $validator;
    }
}
