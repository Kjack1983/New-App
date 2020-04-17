<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relatedArticle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Related Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="relatedArticles form large-9 medium-8 columns content">
    <?= $this->Form->create($relatedArticle) ?>
    <fieldset>
        <legend><?= __('Edit Related Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('articles_id', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
