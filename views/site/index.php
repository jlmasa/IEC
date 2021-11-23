<?php
use app\models\Materials;
/* @var $this yii\web\View */

$this->title = ' ';
$factsheet = sizeof(Materials::find()->where(['Category'=>'Factsheet'])->all());
$infobulletin = sizeof(Materials::find()->where(['Category'=>'Info Bulletin'])->all());
$books= sizeof(Materials::find()->where(['Category'=>'Books'])->all());
$manual = sizeof(Materials::find()->where(['Category'=>'Manual'])->all());
$brochure = sizeof(Materials::find()->where(['Category'=>'Brochure'])->all());
$policybrief = sizeof(Materials::find()->where(['Category'=>'Policy Brief'])->all());
$poster = sizeof(Materials::find()->where(['Category'=>'Poster'])->all());
$technoinfoseries = sizeof(Materials::find()->where(['Category'=>'Techno Info Series'])->all());
$briefingkit = sizeof(Materials::find()->where(['Category'=>'Briefing Kit'])->all());
$abstract = sizeof(Materials::find()->where(['Category'=>'Abstract'])->all());
$flyer = sizeof(Materials::find()->where(['Category'=>'Flyer'])->all());
$fanseries = sizeof(Materials::find()->where(['Category'=>'Fan Series'])->all());
$leaflet = sizeof(Materials::find()->where(['Category'=>'Leaflet'])->all());
?>
	 <a href="http://erdb.denr.gov.ph/" title="ERDB Website" rel="home"><img width="50%" src="http://erdb.denr.gov.ph/wp-content/uploads/2018/07/erdb_header_2-1.gif"></a>
    <div class="jumbotron">
       
        <h1>IEC Material List</h1>

       

        
    </div>

    <div class="body-content">

       <div class="row">
            
<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $factsheet; ?>
                                    </h3>
                                    <p>
                                        Factsheets
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-list-alt" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Factsheet&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">                                  
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $infobulletin; ?>
                                    </h3>
                                    <p>
                                        Info Bulletin
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-align-left" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Info+Bulletin&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
          <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $books; ?>
                                    </h3>
                                    <p>
                                        Books
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-book" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Books&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $manual; ?>
                                    </h3>
                                    <p>
                                        Manual
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-info-sign" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Manual&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			 <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        <?php echo $brochure; ?>
                                    </h3>
                                    <p>
                                        Brochure
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-picture" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Brochure&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>
                                        <?php echo $policybrief; ?>
                                    </h3>
                                    <p>
                                        Policy Brief
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-ok" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Policy+Brief&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        <?php echo $poster; ?>
                                    </h3>
                                    <p>
                                        Poster
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-tint" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Poster&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-olive">
                                <div class="inner">
                                    <h3>
                                        <?php echo $technoinfoseries; ?>
                                    </h3>
                                    <p>
                                        Techno Info Series
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-equalizer" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Techno+Info+Series&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
        <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-fuchsia">
                                <div class="inner">
                                    <h3>
                                        <?php echo $briefingkit; ?>
                                    </h3>
                                    <p>
                                        Briefing Kit
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-briefcase" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Briefing+Kit&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $abstract; ?>
                                    </h3>
                                    <p>
                                        Abstract
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-font" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Abstract&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			 <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>
                                        <?php echo $flyer; ?>
                                    </h3>
                                    <p>
                                        Flyer
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-send" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Flyer&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
			<div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        <?php echo $fanseries; ?>
                                    </h3>
                                    <p>
                                        Fan Series
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-menu-hamburger" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Fan+Series&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
          <div class="col-xs-4 col-sm-4  col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $leaflet; ?>
                                    </h3>
                                    <p>
                                        Leaflet
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-leaf" style="padding-top: 15px"></i>
                                </div>
                                <a href="/ttd/web/materials?MaterialSearch%5Bid%5D=&MaterialSearch%5Bcategory%5D=Leaflet&MaterialSearch%5Btitle%5D=&MaterialSearch%5Byear%5D=" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
        </div>

    </div> 


