<?php echo validation_errors() ?>

<?php echo form_open('create-tasks'); ?>

<?php
$currentList = null;
$AllLists = array();

class ListItem {
    function ListItem($id, $title){
        $this->id = $id;
        $this->title = $title;
    }
}

foreach ($lists as $list):
    if($currentList != $list['listId']){
        array_push($AllLists, new ListItem($list['Id'], $list['Title']));
        $currentList = $list['Id'];
    }
endforeach;


?>

<div class="form-group">
    <label for="exampleSelect1">Kies een lijst</label>
      <select class="form-control">
        <?php foreach ($AllLists as $list): ?>
            <option><?= $list->title ?></option>
        <?php endforeach; ?>
      </select>

    <br>
    
    <label for="title">Taak naam</label>
    <input type="text" class="form-control" name="name" placeholder="Naam">

    <br>
    
    <label for="title">Taak omschrijving</label>
    <input type="text" class="form-control" name="description" placeholder="Omschrijving">
    <small class="form-text text-muted">Wat zijn de handelingen van de taak</small>


</div>

  <input class="btn btn-primary" type="submit" name="submit" value="Taak toevoegen" />
</form>