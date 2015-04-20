function setupListeners() {
//  google.maps.event.addDomListener(window, 'load', initialize);
    // searchbox is the var for the google places object created on the page
    google.maps.event.addListener(searchbox, 'place_changed', function () {
        var place = searchbox.getPlace();
        if (!place.geometry) {
            // Inform the user that a place was not found and return.
            return;
        } else {
            // migrates JSON data from Google to hidden form fields
            populateResult(place);
        }
    });
}

function populateResult(place) {
    // moves JSON data retrieve from Google to hidden form fields
    // so Yii2 can post the data
    $('#place-google_place_id').val(place['place_id']);
    $('#place-full_address').val(place['formatted_address']);
    $('#place-website').val(place['website']);
    $('#place-vicinity').val(place['vicinity']);
    $('#place-name').val(place['formatted_address']);
    $('#place-gps').val(place['geometry']['location']);
}

function freeResult() {
    $('#place-location').val('');
    $('#place-google_place_id').val('');
    $('#place-full_address').val('');
    $('#place-website').val('');
    $('#place-vicinity').val('');
    $('#place-lat').val('');
    $('#place-lng').val('');
}


