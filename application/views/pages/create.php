<?php echo validation_errors() ?>

<?php echo form_open('create'); ?>

<div class="form-group">
      <label for="title">Lijst titel</label>
      <input type="text" class="form-control" name="title" placeholder="titel">
    </div>

  <input class="btn btn-primary" type="submit" name="submit" value="Lijst aanmaken" />
</form>

<br><hr><br>

<a class="btn btn-primary" href="<?= base_url(); ?>create-tasks">Taken toevoegen</a>