<?php
class Task {
    function Task($id, $taskId, $description){
        $this->id = $id;
        $this->taskId = $taskId;
        $this->description = $description;
    }
}

?>

<?php echo form_open('updateTask') ?>
<input type="hidden" name="id" value="<?= $task[0]['taskId'] ?>">
<label for="title">Taak naam</label>
    <input type="text" class="form-control" name="name" value="<?= $task[0]['Name'] ?>">

    <br>
    
    <label for="title">Taak omschrijving</label>
    <input type="text" class="form-control" name="description" value="<?= $task[0]['Description'] ?>">
    <small class="form-text text-muted">Wat zijn de handelingen van de taak</small>

    <br>

    <label for="title">Hoe lang er aan werken</label>
    <input type="number" class="form-control" name="duration" value="<?= $task[0]['Duration'] ?>">
    <small class="form-text text-muted">Hoe lang duurt de taak</small>
    <br>

  <input class="btn btn-primary" type="submit" name="submit" value="Taak aanpassen" />
</form>