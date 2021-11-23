<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ThemeAsset;

ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid top-app" >
  <h1>Welcome to My Application</h1>
  <h3>This theme has sticky navbar</h3>
  <p>Scroll this page to see how the navbar behaves ".</p>
  <p>The navbar is attached to the top of the page after you have scrolled a specified amount of pixels.</p>
</div>
<nav class="head navbar navbar-default "  data-spy="affix" data-offset-top="210">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sableng9</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Product<span class="caret"></span>
               </a>
              <ul class="dropdown-menu">
                <li><a href="#">Food and Beverages</a></li>
                <li><a href="#">Health Supplement</a></li>
                <li><a href="#">Skin Care</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">More Product</li>
                <li><a href="#">OEM Product</a></li>
                <li><a href="#">Services</a></li>
              </ul>
            </li>
            <li><a href="site/contact">Contact</a></li>
            <li><a href="site/about">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
           
            <li></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="head">


</div>
<div class="wrap">
  

    <div class="container">
     <div class="row">
       <div class="col-lg-6">
         <div class="info-box">
          <h4>
            Information
          </h4>
          <hr>
          <p>
          Lorem ipsum dolor sit amet, ex adhuc ullum equidem cum, wisi labores scriptorem nam ei, diam verterem quo ne. Sit at soleat labitur placerat, hinc doming ex eam, cu quem stet autem usu. No ius sonet discere. At eos ipsum quodsi appareat, eu est suscipit gubergren scripserit. Sit quaeque ceteros et, id sed percipit vituperatoribus, quo quidam luptatum praesent ei.
          </p>
         </div>  
       </div>
       <div class="col-lg-6">
          <div class="info-box">
           <h4>
           New Product
           </h4>
           <hr>
           <p>
           Ea est partem detracto scriptorem, cum et iriure phaedrum gubergren. Tation graecis consequat ius ex, iisque deserunt id vim. Te vix porro vivendum, qui ea nusquam detracto. Sumo postea his id, possim copiosae ullamcorper nec at. Sit ornatus praesent interesset ut, natum facer interesset pro ad, nam ei errem suscipiantur.
          </p>
          </div>  
       </div>
       
     </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sableng9 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
