<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Related Article'), ['action' => 'edit', $relatedArticle->id], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Related Article'), ['action' => 'delete', $relatedArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('List Related Articles'), ['action' => 'index'], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('New Related Article'), ['action' => 'add'], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index'], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add'], array('class' => 'nav-link')) ?> </li>
    </ul>
</nav>

<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item has-sub"><?= $this->Html->link(__('Edit Related Article'), ['action' => 'edit', $relatedArticle->id], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Related Article'), ['action' => 'delete', $relatedArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)], array('class' => 'nav-link')) ?> </li>
        <li class="nav-item has-sub">
            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
                $this->Html->tag('span', 'List Related Articles', array('class' => array('ml-2'))),
                array(
                    'action' => 'index',
                ),
                array('escape' => false)
            ); ?>
        </li>
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
                $this->Html->tag('span', 'List Articles', array('class' => array('ml-2'))),
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

<div class="relatedArticles view large-9 medium-8 mt-2 columns m">
    <h3><?= h($relatedArticle->title) ?></h3>
    <table class="table table-striped">
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
    <div>
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($relatedArticle->body)); ?>
    </div>
</div>
