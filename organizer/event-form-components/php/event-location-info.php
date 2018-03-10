<style>
    #map {
        height: 400px;
    }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
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
                           class="col-sm-3 col-form-label">Indoor name:</label>
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
                        Location:</label>
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