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

<?php echo form_open('edit'); ?>

<div class="form-group">
      <label for="title">Lijst titel</label>
      <input type="text" class="form-control" name="title" value="<?= $items->title ?>">
    </div>

  <input class="btn btn-primary" type="submit" name="submit" value="Lijst updaten" />
</form>
<?php endforeach; ?>



