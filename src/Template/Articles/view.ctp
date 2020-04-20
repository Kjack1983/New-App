<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<!-- <nav class="navbar bg-dark large-3 medium-4 columns" id="actions-sidebar">
    <ul class="navbar-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index'], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add'], array('class' => 'nav-link')) ?> </li>
    </ul>
</nav> -->
<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id], array('class' => 'nav-link')) ?> </li>
        <li><?= $this->Html->link(__('Delete Article'), ['action' => 'delete', $article->id], array('class' => 'nav-link')) ?> </li>
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
        <li class="nav-item has-sub">
        <?= $this->Html->link(
            $this->Html->tag('i', '', array('class' => array('fa', 'fa-home'))) .
            $this->Html->tag('span', 'New Article', array('class' => array('ml-2'))),
            array(
                'controller' => 'Articles',
                'action' => 'add',
            ),
            array('escape' => false)
        ); ?>
        </li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: -424px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
    <div class="ps__rail-y" style="top: 424px; height: 900px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 5px;"></div></div></div>
</div>
<div class="articles view large-9 medium-8 columns">
    <h3><?= h($article->title) ?></h3>
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($article->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Archived') ?></th>
            <?= $this->Form->create($article->archived) ?>
            <td>
                <?php
                    echo $this->Form->button('Archive', array('class' => 'btn btn-success'));
                ?>
            </td>
            <?= $this->Form->end() ?>
            
        </tr>
    </table>
    <h4><?= __('Body') ?></h4>
    <?= $this->Text->autoParagraph(h($article->body)); ?>
    <?php 
        if (count($assocRelatedArticles) !== 0) { 
    ?>
    <h4><?= __('Related Articles') ?></h4>
    <div class="row">
        <?php
            $htmlRow = '';
            foreach($assocRelatedArticles as $row) {
                $htmlRow .= '<div class="col-sm article-width border-success p-3 ml-3 bg-dark">'.
                '<h3 class="text-info">' . $row['title'] .'</h3 >'.
                '<p class="text-info">Content: ' .$row['body']. '</p>'
                .$this->Html->link('View Article >>', array('controller' => 'relatedArticles', 'action' => 'view', $row['id']), array('class' => 'btn btn-info')).
                '</div>';
            }
            echo $htmlRow;
        ?>
    </div>
    <?php } ?>
</div>
