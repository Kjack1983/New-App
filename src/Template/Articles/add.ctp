<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php echo $this->element('sidebar'); ?>

<div class="articles form large-9 medium-8 mt-2 columns">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Add Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('reference');
            echo $this->Form->control('archived');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
