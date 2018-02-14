

<?php 

$currList = null;
$myList = array();

class Task {
    function Task($title){
        $this->title = $title;
    }
}



?>

<?php foreach ($lists as $list):

    if($currList != $list['listId']){

        $listItem = new Task($list['Title']);

        array_push($myList, $listItem);
    }

    var_dump($myList);

?>

    


    <?php if($currList != $list['listId']){ ?>
        <h3><?= $list['Title']; ?></h3>
    <?php $currList = $list['listId']; } ?>

    <?php if($list['Description'] != ''){ ?>
        <li><?= $list['Description'] ?></li>
    <?php } ?>   

<?php endforeach; ?>

