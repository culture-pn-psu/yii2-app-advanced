<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use backend\assets\ThemeAsset;
use backend\assets\AdminBsbAsset;

ThemeAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<?= $this->render('//layouts/head') ?>

<body class="theme-<?= AdminBsbAsset::getSkin() ?>">

    <!-- Header Begin -->
    <?= $this->render('//layouts/header') ?>
    <!-- Header Begin -->

    <?php $this->beginBody() ?>
    <!-- START WRAPPER -->
    
     <?= $this->render('//layouts/search') ?>
    
    <?= $this->render('//layouts/sidebar') ?>
    
    <!--<div id="main-div-content">-->
        
        
    <!--<div class="wrapper">-->
        <!-- Sidebar Begin -->
        
        <!-- Sidebar End -->
        <!-- Content Header Begin -->
        
        <!-- Content Header End -->
        <!-- Content Begin -->
        <?= $this->render('//layouts/content', ['content' => $content]) ?>
        <!-- Content End -->
    <!--</div>-->
    <!--</div>-->
    <!-- END WRAPPER -->
    <?php $this->endBody() ?>

    <!-- Footer Begin -->
    <?php #= $this->render('//layouts/footer') ?>
    <!-- Footer End -->
</body>
</html>
<?php $this->endPage() ?>
