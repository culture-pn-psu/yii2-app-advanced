<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('album', 'อัลบั้ม'), 'url' => ['/album']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box'>
    <div class='box-body pad'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
        
        <?php if (Yii::$app->request->get('print')) { ?>


            <?=
            DetailView::widget([
                'model' => $model,
                'template' => '<tr><th nowrap="">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    'album_title',
                    'album_detail:html',
                    'album_date_create:date',
                ],
            ])
            ?>
<?php } else { ?>

            <div class="row">
                <div class='col-sm-3'>    
    <?= Html::img($model->imgTemp, ['class' => 'thumbnail', 'width' => '100%']) ?> 
                </div>
                <div class='col-sm-9'>  



                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [


                            'title',
                            'category.title',
                            'detail:ntext',
                        ],
                    ])
                    ?>
<?php } ?>
            </div><!--box-body pad-->
        </div><!--box-body pad-->
    </div><!--box-body pad-->

    <div class='box-body pad'>
<?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails()]); ?>
    </div><!--box-body pad-->


</div><!--box box-info-->
