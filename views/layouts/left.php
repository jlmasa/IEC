<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
              
            </div>
            <div class="pull-left info">
                <!--<p>Alexander Pierce</p>-->

              <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home','icon'=> ' fa-home', 'url' => ['/site/index']],
            ['label' => 'Materials', 'icon'=>' fa-book','url' => ['/materials']],
            ['label' => 'About','icon'=>' fa-exclamation-circle', 'url' => ['/site/about']],
              ['label' => 'Admin Menu','icon'=>' fa-key', 'url' => ['/admin/'],'visible'=> Yii::$app->user->can('permission_admin')],        
                    [
                        'label' => 'Add List',
                        'icon' => ' fa-archive',
                        'items' => [
                            ['label' => 'Category List', 'icon'=>' fa-asterisk','url' => ['/category/'],'visible'=> Yii::$app->user->can('permission_admin')],
                            ['label' => 'Name List', 'icon'=>' fa-asterisk','url' => ['/name/'],'visible'=> Yii::$app->user->can('permission_admin')],
                            ['label' => 'Position List', 'icon'=>' fa-asterisk','url' => ['/position/'],'visible'=> Yii::$app->user->can('permission_admin')],
        	               ['label' => 'Role List','icon'=>' fa-asterisk', 'url' => ['/role/'],'visible'=> Yii::$app->user->can('permission_admin')]
                         
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
