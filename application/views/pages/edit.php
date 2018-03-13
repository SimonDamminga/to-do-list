<?php 

$currentList = null;
$AllLists = array();
$Alltasks = array();

class Task {
    function Task($id, $taskId, $description){
        $this->id = $id;
        $this->taskId = $taskId;
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
    array_push($Alltasks, new Task($list['listId'], $list['taskId'], $list['Description']));
    if($currentList != $list['Id']){
        array_push($AllLists, new ListItem($list['Id'], $list['Title']));
        $currentList = $list['Id'];
    }
    
endforeach;

foreach($AllLists as $list):
    foreach($Alltasks as $task):
        if($list->id == $task->id){
            array_push($list->tasks, new Task($task->id, $task->taskId, $task->description));
        }
    endforeach;
endforeach; 



foreach ($AllLists as $items): ?>

<?php echo form_open('update'); ?>

<input type="hidden" name="id" value="<?= $items->id ?>" >
<div class="form-group">
      <label for="title">Lijst titel</label>
      <input type="text" class="form-control" name="title" value="<?= $items->title ?>">
    </div>

  <input class="btn btn-primary" type="submit" name="submit" value="Lijst updaten" />
</form>

<br><h4>Taken:</h4><br>

    <?php foreach($items->tasks as $task): ?>
        <div>
            <p><?= $task->description ?></p>
            <a class="btn btn-primary" href="<?= base_url() ?>edit-task/<?= $task->taskId ?>">Edit</a>
            <a class="btn btn-danger" href="<?= base_url() ?>delete-task/<?= $task->taskId ?>">Delete</a>
            <hr><br>
        </div>
    <?php endforeach; ?>

<?php endforeach; ?>





