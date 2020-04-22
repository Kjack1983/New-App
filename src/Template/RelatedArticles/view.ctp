<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle $relatedArticle
 */
?>
<?php echo $this->element('sidebar'); ?>
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
