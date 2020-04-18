<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            $related = array();
            foreach($selectedArticles as $id) {
                $related[] = $id - 1;
            }

            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('reference');
            echo $this->Form->control('archived');
            echo $this->Form->select(
                'Related.articles', 
                $relatedArticles, 
                [
                    'multiple' => true, 
                    'value' => $related
                ]
            );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <div class="row">
    <h4><?= __('Related Articles') ?></h4>
        <?php
            $htmlRow = '<section class="Posts">'; 
            foreach($assocRelatedArticles as $row) {    
                $htmlRow .= '<article class="Post">' .
                $this->Html->link('View Post', array('controller' => 'relatedArticles', 'action' => 'view', $row['id']))
                .'<h3>Title:'.$row['title'].'</h3>'
                .'<div class="Author">Content: ' .$row['body']. '</div>'                
                .'</article>';
            }
            $htmlRow .= '</section>';
            echo $htmlRow;
        ?>
    </div> 
</div>
