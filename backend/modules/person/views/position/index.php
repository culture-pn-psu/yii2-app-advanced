<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\person\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('person', 'Positions');
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class='box box-info'>
        <div class='box-header'>
            <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
        </div><!--box-header -->

        <div class='box-body pad'>
            <div class="position-index">
            
            <!--<h1><?= Html::encode($this->title) ?></h1>-->
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <p>
                <?= Html::a(Yii::t('person', 'Create Position'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?php Pjax::begin(); ?>                            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'title',
           
            [
                'attribute'=>'parent_id',
                'value'=> 'parentTitle',
            ],
            [
                'attribute'=>'under',
                'value'=> 'underTitle',
            ],
            'type',
            'sort',
            // 'under',

                ['class' => 'yii\grid\ActionColumn'],
                ],
                ]); ?>
                        <?php Pjax::end(); ?>        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
