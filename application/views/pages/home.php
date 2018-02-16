<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/index.css">

<?php 

$currentList = null;
$AllLists = array();
$Alltasks = array();

class Task {
    function Task($id, $description){
        $this->id = $id;
        $this->description = $description;
    }
}

class ListItem {
    function ListItem($id, $title){
        $this->id = $id;
        $this->title = $title;
        $this->tasks = array();
    }
}

foreach ($lists as $list):
    array_push($Alltasks, new Task($list['listId'], $list['Description']));
    if($currentList != $list['listId']){
        array_push($AllLists, new ListItem($list['listId'], $list['Title']));
        $currentList = $list['listId'];
    }
endforeach;

foreach($AllLists as $list):
    foreach($Alltasks as $task):
        if($list->id == $task->id){
            array_push($list->tasks, $task->description);
        }
    endforeach;
endforeach;

foreach ($AllLists as $items): ?>

<div class="list-group custom-list">
  <a href="<?= base_url(); ?>" class="list-group-item active">
    <?= $items->title ?>
  </a>
    <?php foreach ($items->tasks as $tasks): ?>
        <a href="#" class="list-group-item"><?= $tasks ?></a>
    <?php endforeach; ?>
</div>
<br>

<?php endforeach; ?>


