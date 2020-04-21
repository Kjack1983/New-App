<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item has-sub">
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $relatedArticle->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)],
                    array('class' => 'nav-link')
                )
            ?>
        </li>
        <li class="nav-item has-sub">
            <?= $this->Html->link(
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-home'))) .
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
                $this->Html->tag('span', 'New Article', array('class' => array('ml-2'))),
                array(
                    'controller' => 'Articles',
                    'action' => 'add'
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
                    'action' => 'index',
                ),
                array('escape' => false)
            ); ?>
        </li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: -424px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
    <div class="ps__rail-y" style="top: 424px; height: 900px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 5px;"></div></div></div>
</div>
<div class="relatedArticles form large-9 medium-8 mt-2 columns">
    <?= $this->Form->create($relatedArticle) ?>
    <fieldset>
        <legend><?= __('Edit Related Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('articles_id', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn mt-2 btn-success')) ?>
    <?= $this->Form->end() ?>
</div>
