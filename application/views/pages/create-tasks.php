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
    if($currentList != $list['Id']){
        array_push($AllLists, new ListItem($list['Id'], $list['Title']));
        $currentList = $list['Id'];
    }
endforeach;


?>

<h3>Een taak toevoegen</h3>
<br>

<div class="form-group">
    <label for="exampleSelect1">Kies een lijst</label>
      <select class="form-control" name="list">
        <?php foreach ($AllLists as $list): ?>
            <option value="<?= $list->id ?>" <?php set_select('list', $list->id, False) ?> ><?= $list->title ?></option>
        <?php endforeach; ?>
      </select>

    <br>
    
    <label for="title">Taak naam</label>
    <input type="text" class="form-control" name="name" placeholder="Naam">

    <br>
    
    <label for="title">Taak omschrijving</label>
    <input type="text" class="form-control" name="description" placeholder="Omschrijving">
    <small class="form-text text-muted">Wat zijn de handelingen van de taak</small>

    <br>

    <label for="title">Hoe lang er aan werken</label>
    <input type="number" class="form-control" name="duration" placeholder="Tijd in minuten">
    <small class="form-text text-muted">Hoe lang duurt de taak</small>

    <br>

    <label for="title">Status</label>
    <input type="number" min="1" max="3" class="form-control" name="status" placeholder="kies de status">
    <small class="form-text text-muted">1, 2 of 3</small>



</div>

  <input class="btn btn-primary" type="submit" name="submit" value="Taak toevoegen" />
</form>