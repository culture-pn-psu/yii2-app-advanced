<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\album\models\AlbumCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('album', 'Album Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class='box box-info'>
        <div class='box-header'>
            <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
        </div><!--box-header -->

        <div class='box-body pad'>
            <div class="album-category-index">
            
            <!--<h1><?= Html::encode($this->title) ?></h1>-->
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <p>
                <?= Html::a(Yii::t('album', 'Create Album Category'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'title',
            'parent_id',
            'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
                ],
                ]); ?>
                                </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
