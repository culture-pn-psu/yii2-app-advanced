<?php

use kongoon\orgchart\OrgChart;
use backend\modules\person\models\Position;
use backend\modules\person\models\PersonPosition;

$model = Position::find()->where(['id' => 7])->one();

$data = [];
$data[$model->id] = [['v' => "position{$model->id}", 'f' => '<strong>' . $model->title . '</strong>'], '', 'The President'];
$head =  "position{$model->id}";
$under =  $head;
$underPostionOld = '';
$underPostionNew = '';
$underPerson = '';

$positions = Position::find()->where(['IS NOT', 'under', NULL])->orderBy('sort')->all();
foreach ($positions as $val) {  
    
    $data[$val->id] = [['v' => "position{$val->id}", 'f' => '<strong>' . $val->title . '</strong>'], "position{$val->under}", ''];
//    $person = PersonPosition::find()->where(['position_id' => $val->under])->orderBy(['position_id' => 'asc'])->all();
//    
//    
//    foreach ($person as $key => $per) {
//       $under =  ($key==0)?$head:$underPostionNew;
//       $head="person{$per->person_id}";       
//        $data[] = [['v' => $head, 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Mike&w=120&h=150" /><br /> <strong>' . $per->person->fullname . '</strong>'], $under, ''];
//        $underPerson="person{$per->person_id}";
//        $underPostionNew = $underPerson;
//    }
}

echo "<pre>";
print_r($data);
echo "</pre>";
echo OrgChart::widget([ 'data' => $data]);



//[['v' => 'Mike', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Mike&w=120&h=150" /><br /> <strong>Mike</strong><br />The President'], '', 'The President'],
//        [['v' => 'Jim', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Jim&w=120&h=150" /><br /><strong>Jim</strong><br />The Test'], 'Mike', 'VP'],
//        [['v' => 'ทดสอบ', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=ทดสอบ&w=120&h=150" /><br /><strong>ทดสอบ</strong><br />The Test'], 'Mike', ''],
//        [['v' => 'Bob', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Bob&w=120&h=150" /><br /><strong>Bob</strong><br />The Test'], 'Jim', 'Bob Sponge'],
//        [['v' => 'Caral', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Caral&w=120&h=150" /><br /><strong>Caral</strong><br />The Test'], 'Mike', 'Caral Title'],
?>
