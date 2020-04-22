<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php echo $this->element('sidebar'); ?>

<div class="articles view large-9 medium-8 columns mt-2">
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
