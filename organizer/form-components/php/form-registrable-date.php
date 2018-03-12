<?php $time = date("Y-m-d", strtotime("+ 3 days")); ?>
<div class="form-group row">
    <label for="event-registrable-date" class="col-sm-3 col-form-label">Registrable
        Date: <span class="required">*<span></label>
    <input type="date" class="col-sm-3 form-control"
           id="event-registrable-date"
           name="event-registrable-date"
           min="<?php echo $time ?>"
           value="<?php echo $time ?>"
           required>
    <div class="invalid-feedback offset-sm-3">
        Please select a proper start date.
    </div>
</div>