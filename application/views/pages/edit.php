<?php echo validation_errors() ?>
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


foreach ($list as $list):
    array_push($Alltasks, new Task($list['listId'], $list['Description']));
    if($currentList != $list['Id']){
        array_push($AllLists, new ListItem($list['Id'], $list['Title']));
        $currentList = $list['Id'];
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

    <?php if($items->tasks){ foreach ($items->tasks as $tasks): ?>
        <a href="#" class="list-group-item"><?= $tasks ?></a>
    <?php endforeach; } ?>
</div>
<br>
<a class="btn btn-primary" href="<?php echo site_url('edit/'.$items->id) ?>">Save</a>
<br>
<br>

<?php endforeach; ?>

<?php echo form_open('edit') ?>

