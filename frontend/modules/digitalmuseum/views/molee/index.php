<?php
/* @var $this yii\web\View */

use frontend\modules\digitalmuseum\assets\MoleeAsset;
use yii\web\View;
$asset = MoleeAsset::register($this);


$this->params['breadcrumbs'][] = [
    'label' => $this->title = Yii::t('app', 'Digital Museum'),
    'url' => ['/digitalmuseum']
];
$this->title = Yii::t('app', 'พิพิธภัณฑ์พระเทพญาณโมลี');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?=$this->title?></h1>
<?php /*=Yii::$app->view->renderFile($asset->basePath.'/_auto/html5/project.php')*/?>

<iframe src="<?=$asset->baseUrl?>/_auto/Tourweaver_Project1.html" width="100%" height="500" style="border:none;">
</iframe>

<!--<div id="flashcontent" style="width: 100%;height: 500px;"> 
  To view virtual tour properly, Flash Player 9.0.28 or later version is needed. 
 Please download the latest version of <a href="http://www.adobe.com/go/getflashplayer" target="_blank">Flash Player</a> and install it on your computer.
 </div> -->
<?php

//
//$this->registerJsFile($asset->baseUrl.'/_auto/flash/swfobject.js',['position' => View::POS_BEGIN]);
//$this->registerJs('
// var jsReady = false;
// function isJsReady() {
// return jsReady;
// }
// function pageInit() {
// jsReady = true;
//  }
// function thisMovie(movieName) {
// return document.getElementById(movieName);
// }
// function changeSceneOnLoad(){
// var panoid=window.location.search.split("&")[0];
// if(panoid.indexOf("firstscene") != -1)
// {
// panoid = panoid.split("=")[1];
// }
// if(panoid)
// {
// if(thisMovie("sotester").twAPI){
// setTimeout(function(){thisMovie("sotester").twAPI("switchToScene", panoid);},500);
// }else{
// setTimeout(changeSceneOnLoad,1000);
// }	
// }
// }
// ', View::POS_LOAD);
//
//$this->registerJs('
// // <![CDATA[ 
// var so = new SWFObject("'.$asset->baseUrl.'/_auto/flash/twviewer.swf", "sotester", "100%", "100%", "9.0.0", "#FFFFFF"); 
// so.addParam("allowNetworking", "all"); 
// so.addParam("allowScriptAccess", "always"); 
// so.addParam("allowFullScreen", "true"); 
// so.addParam("scale", "noscale"); 
// so.addParam("wmode", "direct"); 
////<!-%% Share Mode %%->
// so.addVariable("lwImg", ""); 
// so.addVariable("lwBgColor", "255,255,255,255"); 
// so.addVariable("lwBarBgColor", "255,255,255,255"); 
// so.addVariable("lwBarColor", "255,0,255,0"); 
// so.addVariable("lwBarBounds", "-5,-53,136,136"); 
// so.addVariable("lwlocation", "4"); 
// so.addVariable("lwShowLoadingPercent", "true"); 
// so.addVariable("lwTextColor", "255,0,0,0"); 
// so.addVariable("buildSN", "7.96.150430"); 
// so.addVariable("iniFile", "config_Project1.bin"); 
// so.addVariable("progressType", "1"); 
// so.addVariable("swfFile", "'.$asset->baseUrl.'/_auto/flash/resources/project1_loading.swf"); 
// so.addVariable("percentType", "0"); 
// so.addVariable("sizeFile", ""); 
// so.addVariable("href", "'.$asset->baseUrl.'/_auto/flash/"); 
// so.addVariable("lwbounds", "-5,-53,136,136");
// so.write("flashcontent"); 
//  changeSceneOnLoad(); 
//', View::POS_LOAD);
//
//
