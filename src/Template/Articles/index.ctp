<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
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
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
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

<div class="articles index large-9 medium-8 mt-2 columns">
    <h3><?= __('Articles') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('archived') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <?php $archivedArticle = ($article->archived ? '<button type="button" class="btn btn-warning">Archived</button>': '<button type="button" class="btn btn-success">Non Archived</button>'); ?>
                <tr <?php if ($article->archived): ?> class="highlight"<?php endif;?>>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td><?= h($article->modified) ?></td>
                <td><?= h($article->reference) ?></td>
                <td><?php echo $archivedArticle; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
