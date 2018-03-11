<style>
    #map {
        height: 400px;
    }
</style>

<div class="form-group row">
    <div class="col-12 px-0">
        <div id="map"></div>
        <p>Click on the map to add markers.</p>
    </div>
    <div class="col-12 px-0">
        <div id="location-field">
            <div class="row container-fluid p-0 m-0">
                <!-- Indoor Location Name -->
                <div class="form-group row col-12 p-0 m-0">
                    <label for="indoor-name"
                           class="col-sm-3 col-form-label">Indoor name: <span class="required">*<span></label>
                    <input type="text" class="col-sm-9 form-control"
                           id="indoor-name"
                           name="indoor-name"
                           placeholder="Indoor name" required>
                    <div class="invalid-feedback offset-sm-3">
                        Please fill an indoor location name.
                    </div>
                    <!-- Outdoor Location Name -->
                    <label for="location"
                           class="col-sm-3 col-form-label">Outdoor
                        Location: <span class="required">*<span></label>
                    <input type="text" class="col-sm-9 form-control"
                           id="location"
                           name="location"
                           placeholder="Outdoor Location" required>
                    <div class="invalid-feedback offset-sm-3">
                        Please fill a location address.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>