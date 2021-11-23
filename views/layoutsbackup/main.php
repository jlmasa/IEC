<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\components\MenuHelper;

//echo Nav::widget([
  //  'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
//]);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="site-index">
<a href="http://erdb.denr.gov.ph/" title="ERDB Website" rel="home"><img width="55%" style="padding-top:50px;"src="http://erdb.denr.gov.ph/wp-content/uploads/2018/07/erdb_header_2-1.gif"></a>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Materials', 'url' => ['/materials']],
            ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Add List','visible'=> Yii::$app->user->can('permission_admin'),'url' => ['#'],'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>','items' => [
        	['label' => 'Category List', 'url' => ['/category/'],'visible'=> Yii::$app->user->can('permission_admin')],
        	['label' => 'Role List', 'url' => ['/role/'],'visible'=> Yii::$app->user->can('permission_admin')],],],
            ['label' => 'Admin Menu', 'url' => ['/admin/'],'visible'=> Yii::$app->user->can('permission_admin')],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                    
                )
                
                . Html::endForm()
                . '</li>'
            )
        ],
        
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ecosystem Research and Development Bureau <?= date('Y') ?></p>

        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
