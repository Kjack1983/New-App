<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelatedArticle[]|\Cake\Collection\CollectionInterface $relatedArticles
 */
?>

<?php echo $this->element('sidebar'); ?>
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
