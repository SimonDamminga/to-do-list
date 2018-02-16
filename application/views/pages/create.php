<?php echo validation_errors() ?>

<?php echo form_open('create'); ?>

<div class="form-group">
      <label for="title">Lijst titel</label>
      <input type="text" class="form-control" name="title" placeholder="titel">
    </div>
    <!-- <div class="form-group">
      <label for="task">Een taak toevoegen</label>
      <input type="password" class="form-control" placeholder="Taak">
    </div> -->
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  <input class="btn btn-primary" type="submit" name="submit" value="Create news item" />
</form>