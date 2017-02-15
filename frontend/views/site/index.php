<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;

$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');

$this->title = Yii::$app->name;

use frontend\assets\AppAsset;
$asset=AppAsset::register($this);
?>
<!--<section >
    <div class="container">
        <div class="row">
            <div class='col-sm-12'>
<?= Html::img($asset->baseUrl . '/assets/images/culture.png', ['width' => '100%']) ?>
            </div>
        </div>
    </div>
</section>-->





<section id="blog" class="home" >
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class='col-sm-4 col-md-push-8' style="margin-top:-60px;">
                    <?php #= $this->render('_galya_slide', [ 'asset' => $asset,]) ?>
                </div>
                <div class='col-sm-8 col-md-pull-4' style="margin-bottom: 20px;">
                    <img src="<?= $asset->baseUrl ?>/assets/images/bran.png" alt="logo" width="100%" />
                </div>

            </div>
        </div>
    </div>



    <div class="container home">

        <div class="row">
            <div class='col-sm-12'>
                <?php #= $this->render('_slide') ?>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-sm-12">
                <?=
                $this->render('_pr', [
                    'article_category_id' => '1',
                    'asset' => $asset,
                    'baseUrl' => $baseUrl,
                    'basePath' => $basePath,
                    'link'=>'pr'
                ])
                ?>
            </div>
        </div>


                <?=
                $this->render('_prOther', [
                    'article_category_id' => 5,
                    'asset' => $asset,
                    'baseUrl' => $baseUrl,
                    'basePath' => $basePath,
                    'link'=>'news-other'
                ])
                ?>


        <div class="row">
            <div class="col-sm-6">
                <?= $this->render('_calendar_activity') ?>
            </div>
            <div class="col-md-3 rightSide" id="slaveMenu">
                <?php #= $this->render('_link') ?>
            </div>
            <div class="col-md-3 rightSide" id="slaveMenu">
                <?php #= $this->render('_link') ?>
            </div>
        </div>



        <?=
                $this->render('_articleOther', [
                    'article_category_id' => 2,
                    'asset' => $asset,
                    'baseUrl' => $baseUrl,
                    'basePath' => $basePath,
                    'link'=>'article'
                ])
                ?>



    </div>

</section>


<?php
echo $this->render('_album', [
    //'arts'=>$arts,
    'asset' => $asset,
    'baseUrl' => $baseUrl,
    'basePath' => $basePath
        ]
)
?>

<!--<div class="row">
    <div class="col-sm-12">
<?=
$this->render('_article', [
    'article_category_id' => '2',
    'asset' => $asset,
    'baseUrl' => $baseUrl,
    'basePath' => $basePath,
])
?>
    </div>
</div>-->


        <?php #= $this->render('_art') ?>







<!--<div id="tf-home" class="text-center">
    <div class="overlay">
        <section id="about">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown">About Us</h2>
                    <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>

                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft">
                        <h3 class="column-title">Video Intro</h3>
                         16:9 aspect ratio
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeInRight">
                        <h3 class="column-title">Multi Capability</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="nostyle">
                                    <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                                    <li><i class="fa fa-check-square"></i> When an unknown</li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <ul class="nostyle">
                                    <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                                    <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                                </ul>
                            </div>
                        </div>

                        <a class="btn btn-primary" href="#">Learn More</a>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>-->
