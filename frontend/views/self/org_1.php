<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use backend\modules\person\models\Position;
use yii\bootstrap\Modal;

$this->title = 'ผังองค์กร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
<!--     <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>

        <div class="row">
            <div class="col-sm-12">


<?= Position::getTree(7) ?>


            </div>
        </div>
    </div>
</div>

<?php
Modal::begin([
    //'header' => yii\helpers\Html::tag('h4', 'Add Event'),
    'id' => 'modalForm',
        //'size' => 'modal-sm'
]);
echo yii\helpers\Html::tag('div', '', ['id' => 'modalContent']);

Modal::end();

$this->registerJs(' 
    $(".ul-per .person").each(function(){
        var id = $(this).attr("data"); 
        $(this).click(function(e) { 
            var data={                   
                    id:id,
                } 
            $.ajax({
                    url: "' . Yii::$app->urlManager->createUrl('/person/default/view') . '",
                    data: data,
                    type: "GET",
                    success: function(data) {                        
                        $("#modalForm").find("#modalContent").html(data);
                        $("#modalForm").modal("show");
                    }
                });  
            return false;
        });
    });
');

$css="
/*####################*/

/*Now the CSS*/

.wrap_tree{
    position: relative;
    width: 100%;
    height: 100%;
    
    max-height:2500px;
    float: left;	
    overflow: auto;   

    -moz-user-select: -moz-none;
    -khtml-user-select: none;
    -webkit-user-select: none;

    /*
      Introduced in IE 10.
      See http://ie.microsoft.com/testdrive/HTML5/msUserSelect/
    */
    -ms-user-select: none;
    user-select: none;

}
*{
    margin: 0; padding: 0;
}
.tree{
    /*background: #feffe6;*/
    min-width:600px;
    padding-left:5%;
}

.tree ul {
    padding-top: 20px; position: relative;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 1px 0 1px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 1px solid #ccc;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
    border-right: 1px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 1px solid #ccc;
    width: 0; height: 20px;
}

.tree li a{
    border: 1px solid #ccc;
    padding: 0;
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 12px;
    display: inline-block;

    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    background: #fff;
}

.tree li a#top_head{
    /*background: #fe7301;*/
    color: #fff;
    padding: 10px 20px 10px 10px;
    font-weight: bold;
    background:  #fe7301;
    background-position: 8px 8px;


}
.tree li a#head{
    background: #03abfc;
    color: #fff;
    padding: 5px 10px 5px 5px;
    font-weight: bold;
    background:  #03abfc;
    background-position: 5px 6px;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
    background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
    border-color:  #94a0b4;
}

/*Thats all. I hope you enjoyed it.
Thanks :)*/

#li-item h3{
    border-bottom: 3px solid #aaa;
    padding: 5px 0 5px 10px;
    box-shadow:0 2px 0px #efefef inset,0 1px 0px #999;
}
#li-item a{
    cursor: pointer;
}
#per-item{
    float:left; 
    //border-top:1px solid #fff;	
    border-left:1px solid #fff;	
    border-right:1px solid #666;	
    border-bottom:1px solid #666;	
    border-radius:5px;
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e0e0e0+0,b5b5b5+100 */
    background: #e0e0e0; /* Old browsers */
    background: -moz-linear-gradient(top,  #e0e0e0 0%, #b5b5b5 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  #e0e0e0 0%,#b5b5b5 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom,  #e0e0e0 0%,#b5b5b5 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0e0e0', endColorstr='#b5b5b5',GradientType=0 ); /* IE6-9 */


    box-shadow:0 2px 0px #eee inset,0 2px 5px #aaa;
    -webkit-box-shadow: 0 2px 0px #eee inset,0 2px 5px #aaa;
    -moz-box-shadow: 0 2px 0px #eee inset,0 2px 5px #aaa;

}
a#a-per:hover #per-item{
    background:#ededed;
    border-top:1px solid #fff;	
    border-left:1px solid #fff;
    border-right:1px solid #aaa;	
    border-bottom:1px solid #aaa;	
}
#per-pic{
    display:inline;
    width:50px;
    height:80px;
    float:left;
    margin:5px 0px 5px 5px;
    border-right:1px solid #888;	
    padding:3px 6px 0 0px;
}
#per-pic img{
    border: 0px;
    width: 100%;
    border-top: 2px solid #666;
    box-shadow:0 2px 2px #666 inset,0 2px 0px #ddd;border-radius:5px;
}
#per-detail{
    font-size:11px;
    color:#444;
    text-shadow:0 1px 0 #efefef;
    text-align: left;
    display: inline-block;
    /*float:left;*/
    min-width: 175px;
    width: 182px;
    margin:3px 3px 0px 0px;
    padding:3px 0 0 4px;
    border:0px solid #555;
    height:80px;
    border-left:1px solid #fff;
    overflow: hidden;
    top: 0;
    word-wrap: break-word;
    /*text-wrap:none;*/
}
#per-detail p{
    word-break: break-all;
    margin: 0 0 1px;
}
#per-detail hr{
    border-top: 1px solid #999;
    border-bottom: 1px solid #efefef;
    width: auto;
    margin: 2px 0;
}
.clear{clear:both;}";
$this->registerCss($css);