<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item has-sub">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)],
                array('class' => 'nav-link')
            )
        ?>
    </li>
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

<div class="articles form large-9 medium-8 columns mt-2">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <div class="form-group">
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
            echo __('Related Articles');
            echo $this->Form->select(
                'Related articles', 
                $relatedArticles, 
                [
                    'multiple' => true, 
                    'value' => $related,
                    'label' => 'Related Articles'
                ]
            );
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-info')) ?>
    <?= $this->Form->end() ?>
    <div class="mt-5"></div>
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
