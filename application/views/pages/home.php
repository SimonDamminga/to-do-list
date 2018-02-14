

<?php 

$currList = null;
$currentList = null;
$myList = array();
$tasks = array();

class ListItem {
    function ListItem($title, $taken){
        $this->title = $title;
        $this->taken = $taken;
    }
}



?>

<?php 

foreach ($lists as $list):
    if($currentList != $list['listId']){

        foreach($lists as $listAsTask):
            if($currentList != $listAsTask['listId']){
                if($listAsTask['Description'] != ''){
                    array_push($tasks, $listAsTask['Description']);
                }else{
                    $tasks = 'Geen taken';
                }
            }
        endforeach;

        $listItem = new ListItem($list['Title'], $tasks);

        array_push($myList, $listItem);
        $currentList = $list['listId'];
        $tasks = array();
    }

endforeach; 

var_dump($myList);

?>

    
<?php foreach ($lists as $list): ?>

    <?php if($currList != $list['listId']){ ?>
        <h3><?= $list['Title']; ?></h3>
    <?php $currList = $list['listId']; } ?>

    <?php if($list['Description'] != ''){ ?>
        <li><?= $list['Description'] ?></li>
    <?php } ?>   

<?php endforeach; ?>

