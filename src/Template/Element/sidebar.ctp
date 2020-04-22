<div class="main-menu menu-dark large-3 medium-4 bg-dark large-3 medium-4 columns columns menu-accordion  menu-shadow">
    <div class="main-menu-content ps ps--active-y">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <?php if($this->request->getParam('controller')=='Articles' && $this->request->getParam('action')=='index') { ?>
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
        <?php } ?>
        <?php /*Add*/ ?>
        <?php if($this->request->getParam('controller')=='Articles' && $this->request->getParam('action')=='add') { ?>
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
        <?php } ?>
        <?php /*edit*/ ?>       
        <?php if($this->request->getParam('controller')=='Articles' && $this->request->getParam('action')=='edit') { ?>
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
        <?php } ?>
        <?php if($this->request->getParam('controller')=='Articles' && $this->request->getParam('action')=='view') { ?>
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
                $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
                $this->Html->tag('span', 'New Article', array('class' => array('ml-2'))),
                array(
                    'controller' => 'Articles',
                    'action' => 'add',
                ),
                array('escape' => false)
            ); ?>
            </li>
        <?php } ?>
        <?php if($this->request->getParam('controller')=='RelatedArticles' && $this->request->getParam('action')=='index') { ?>
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
                    $this->Html->tag('i', '', array('class' => array('fa', 'fa-home'))) .
                    $this->Html->tag('span', 'Articles', array('class' => array('ml-2'))),
                    array(
                        'controller' => 'Articles',
                        'action' => 'index'
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
        <?php } ?>
        <?php if($this->request->getParam('controller')=='RelatedArticles' && $this->request->getParam('action')=='add') { ?>
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
                    $this->Html->tag('i', '', array('class' => array('fa', 'fa-home'))) .
                    $this->Html->tag('span', 'Articles', array('class' => array('ml-2'))),
                    array(
                        'controller' => 'Articles',
                        'action' => 'index'
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
        <?php } ?>
        <?php if($this->request->getParam('controller')=='RelatedArticles' && $this->request->getParam('action')=='edit') { ?>
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
        <?php } ?>
        <?php if($this->request->getParam('controller')=='RelatedArticles' && $this->request->getParam('action')=='view') { ?>
            <li class="nav-item has-sub"><?= $this->Html->link(__('Edit Related Article'), ['action' => 'edit', $relatedArticle->id], array('class' => 'nav-link')) ?> </li>
            <li><?= $this->Form->postLink(__('Delete Related Article'), ['action' => 'delete', $relatedArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatedArticle->id)], array('class' => 'nav-link')) ?> </li>
            <li class="nav-item has-sub">
                <?= $this->Html->link(
                    $this->Html->tag('i', '', array('class' => array('fa', 'fa-newspaper-o'))) .
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
                    $this->Html->tag('span', 'New Related Articles', array('class' => array('ml-2'))),
                    array(
                        'action' => 'add',
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
                        'action' => 'index'
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
        <?php } ?>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: -424px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
    <div class="ps__rail-y" style="top: 424px; height: 900px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 15px; height: 5px;"></div></div></div>
</div>