<?php $time = date("Y-m-d", strtotime("+ 7 days")); ?>
<div class="form-group row">
    <label for="event-start-date" class="col-sm-3 col-form-label">Event
        Start Date: <span class="required">*<span></label>
    <input type="date" class="col-sm-3 form-control"
           id="event-start-date"
           name="event-start-date"
        <?php if ($startDate !== null) { ?>
            disabled value="<?php echo $startDate; ?>"
        <?php } else { ?>
           min="<?php echo $time; ?>"
           value="<?php echo $time; }?>"
           required>
    <div class="invalid-feedback offset-sm-3">
        Please select a proper start date.
    </div>
</div>