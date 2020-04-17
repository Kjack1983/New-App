<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Related Article'), ['action' => 'edit', $relatedArticle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Related Article'), ['action' => 'delete', $relatedArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Related Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Related Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="relatedArticles view large-9 medium-8 columns content">
    <h3><?= h($relatedArticle->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($relatedArticle->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $relatedArticle->has('article') ? $this->Html->link($relatedArticle->article->title, ['controller' => 'Articles', 'action' => 'view', $relatedArticle->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($relatedArticle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($relatedArticle->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($relatedArticle->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($relatedArticle->body)); ?>
    </div>
</div>
