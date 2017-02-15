<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use frontend\assets\ThemeAsset;



$this->title = 'Magazine Online';
$this->params['breadcrumbs'][] = $this->title;

$asset = ThemeAsset::register($this);
$this->registerCssFile($asset->baseUrl . '/assets/css/modal-fullscreen.css');
?>

<div class="row">
    <?=
    ListView::widget([
        'dataProvider' => $listDataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);
        },
            ]);
            ?>
</div>


        <?php
        
        
        Modal::begin([
            'header' => Html::tag('h4', 'จุรสาร', ['class' => 'modal-title']),
            'id' => 'modal-fullscreen',
            'size' => Modal::SIZE_LARGE,
        ]);
        echo Html::tag('div', '', ['id' => 'modalContent']);
        Modal::end();
        
        
        $this->registerJs(" 
    $('.row .list_item').each(function(){
        var id = $(this).attr('data');  
        //$('#modal-fullscreen').modal('show');
        //$('#modal-fullscreen').find('#modalContent').html('<iframe src=\"" . Yii::$app->urlManager->createUrl('/backend/magazine/default/preview') . "?id='+id+'\" width=\"100%\" hieght=\"100%\"></iframe>');
        
            $(this).click(function(e) { 
                var data={                   
                        id:id,
                    } 
                $.ajax({
                    url: '" . Yii::$app->urlManager->createUrl('/magazine/preview') . "',
                    data: {id:id},
                    type: 'GET',
                    async: true,
                    success: function(data) {     
                       //$('#modal-fullscreen').find('#modalContent').empty();                         
                       //console.log(data);
                       $('#modal-fullscreen').find('#modalContent').html(data);  
                       $('#modal-fullscreen').modal('show');     
                            
                    }
                }); 
            });
             
            $('#modal-fullscreen').on('hidden.bs.modal', function (e) {
              location.reload();
            });

    });
");
        
        
         