<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle[]|\Cake\Collection\CollectionInterface $relatedArticles
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Related Article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item has-sub">
            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
                $this->Html->tag('span', 'New Related Articles', array('class' => array('ml-2'))),
                array(
                    'action' => 'add',
                ),
                array('escape' => false)
            ); ?>
        </li>
        <li class="nav-item has-sub">
            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-home'))) .
                $this->Html->tag('span', 'Articles', array('class' => array('ml-2'))),
                array(
                    'controller' => 'Articles',
                    'action' => 'index'
                ),
                array('escape' => false)
            ); ?>
        </li>
        <li class="nav-item has-sub">
            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
                $this->Html->tag('span', 'New Article', array('class' => array('ml-2'))),
                array(
                    'controller' => 'Articles',
                    'action' => 'add'
                ),
                array('escape' => false)
            ); ?>
        </li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: -424px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
    <div class="ps__rail-y" style="top: 424px; height: 900px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 5px;"></div></div></div>
</div>
<div class="relatedArticles index large-9 medium-8 columns mt-2">
    <h3><?= __('Related Articles') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('articles_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relatedArticles as $relatedArticle): ?>
            <tr>
                <td><?= $this->Number->format($relatedArticle->id) ?></td>
                <td><?= h($relatedArticle->title) ?></td>
                <td><?= h($relatedArticle->created) ?></td>
                <td><?= h($relatedArticle->modified) ?></td>
                <td><?= $relatedArticle->has('article') ? $this->Html->link($relatedArticle->article->title, ['controller' => 'Articles', 'action' => 'view', $relatedArticle->article->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $relatedArticle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relatedArticle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relatedArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
