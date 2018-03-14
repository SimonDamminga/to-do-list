<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/index.css">

<?php 

$currentList = null;
$AllLists = array();
$Alltasks = array();

class Task {
    function Task($id, $description, $duration, $status){
        $this->id = $id;
        $this->description = $description;
        $this->duration = $duration;
        $this->status = $status;
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
    array_push($Alltasks, new Task($list['listId'], $list['Description'], $list['Duration'], $list['Status']));
    if($currentList != $list['Id']){
        array_push($AllLists, new ListItem($list['Id'], $list['Title']));
        $currentList = $list['Id'];
    }
endforeach;

foreach($AllLists as $list):
    foreach($Alltasks as $task):
        if($list->id == $task->id){
            array_push($list->tasks, $task->description . ' | Tijdsduur: ' . $task->duration . ' min | Status: ' . $task->status);
        }
    endforeach;
endforeach; 

if(empty($lists)){ ?>
    <h3><?= $noResult ?></h3>
<?php }

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
<a class="btn btn-primary" href="<?php echo site_url('edit/'.$items->id) ?>">Edit</a>
<a class="btn btn-danger" href="<?php echo site_url('delete/'.$items->id) ?>">Delete</a>
<br>
<br>

<?php endforeach; ?>


