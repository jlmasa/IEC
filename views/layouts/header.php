<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <!--a href="http://erdb.denr.gov.ph/" title="ERDB Website" rel="home"><img width="25%" src="http://erdb.denr.gov.ph/wp-content/uploads/2018/07/erdb_header_2-1.gif"></a-->

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

       <div class="wrap">
    <?php
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'style' => 'padding-right:25px'],
        'items' => [
      
            
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

  
    ?>
                </div>
            </ul>
        </div>
    </nav>
</header>
