<div class="form-group row">
    <label for="event-start-date" class="col-sm-3 col-form-label">Event
        Start Date:</label>
    <input type="datetime-local" class="col-sm-3 form-control"
           id="event-start-date"
           name="event-start-date"
           min="<?php echo date("Y-m-d")."T00:00:00.00"; ?>"
           required>
    <div class="invalid-feedback offset-sm-3">
        Please select a proper start date.
    </div>
</div>