<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<?php echo $this->element('sidebar'); ?>
<div class="relatedArticles form large-9 medium-8 mt-2 columns">
    <?= $this->Form->create($relatedArticle) ?>
    <fieldset>
        <legend><?= __('Add Related Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('articles_id', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn mt-2 btn-success')) ?>
    <?= $this->Form->end() ?>
</div>
