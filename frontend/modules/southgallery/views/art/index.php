<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'ผลงานทั้งหมด');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art', 'หอศิลป์ภาคใต้'), 'url' => ['/south-gallery']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- About Us Page
        ==========================================-->

<div class="row">
    <div class="col-md-12">
        <div class="about-text">
            <div class="section-title">
                <h4>ผลงาน</h4>
                <h2>Workshop</h2>
                <hr>
                <div class="clearfix"></div>
            </div>


            <div class="row">
                <div class='col-md-12'>
                    <?php
                    echo $this->render('_search', [
                        'model' => $searchModel,
                        'artTechnique' => $artTechnique
                    ]);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class='list-group gallery'>
                    <?php Pjax::begin(); ?> 
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'options' => [
                            'tag' => 'div',
                            'class' => 'list-wrapper',
                            'id' => 'list-wrapper',
                        ],
                        'layout' => "{pager}<br/>{items}<p>{summary}</p>",
                        'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_list_item', ['model' => $model]);
                },
                    ]);
                    ?>
<?php Pjax::end(); ?>
                </div> <!-- list-group / end -->
            </div> <!-- row / end -->

        </div>
    </div>
</div>

<!--
<ul class="portfolio-img">
                    <li data-id="p-1" data-type="web-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work1.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work1.jpg" alt="">
                            </a>
                            <h4>Lorem Website</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-2" data-type="logo-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work2.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work2.jpg" alt="">
                            </a>
                            <h4>Ipsum Logo</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-3" data-type="print-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work3.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work3.jpg" alt="">
                            </a>
                            <h4>Dolor Prints</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-4" data-type="web-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work4.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work4.jpg" alt="">
                            </a>
                            <h4>Sit Amet Website</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-5" data-type="logo-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work5.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work5.jpg" alt="">
                            </a>
                            <h4>Consectetur Logo</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-6" data-type="print-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work6.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work6.jpg" alt="">
                            </a>
                            <h4>Adipisicing Print</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-7" data-type="web-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work7.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work7.jpg" alt="">
                            </a>
                            <h4>Elit Website</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-8" data-type="print-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work8.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work8.jpg" alt="">
                            </a>
                            <h4>Sed Do Prints</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-9" data-type="web-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work9.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work9.jpg" alt="">
                            </a>
                            <h4>Eiusmod Website</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-10" data-type="logo-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work10.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work10.jpg" alt="">
                            </a>
                            <h4>Tempor Logo</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-11" data-type="web-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work11.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work11.jpg" alt="">
                            </a>
                            <h4>Incididunt Website</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                    <li data-id="p-12" data-type="print-design" class="span3">
                        <div class="work">
                            <a href="assets/img/portfolio/work12.jpg" rel="prettyPhoto">
                                <img src="assets/img/portfolio/work12.jpg" alt="">
                            </a>
                            <h4>Ut Labore Print</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </li>
                </ul>-->

