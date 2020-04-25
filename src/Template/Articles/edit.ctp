<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php echo $this->element('sidebar'); ?>

<div class="articles form large-9 medium-8 columns mt-2">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <div class="form-group">
        <legend><?= __('Edit Article') ?></legend>
        <?php

            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('reference');
            echo $this->Form->control('archived');
            echo __('Related Articles');
            echo $this->Form->select(
                'Related articles', 
                $relatedArticlesId, 
                [
                    'multiple' => true, 
                    'label' => 'Related Articles',
                    'value' => $selectedArticles
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
