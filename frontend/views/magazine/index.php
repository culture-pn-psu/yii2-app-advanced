<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use backend\modules\magazine\models\Magazine;

?>
<h1>จุรสาร</h1>

<?php
print_r(Magazine::listIndex());
ListView::widget([
   '' 
]);
?>
