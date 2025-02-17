document.addEventListener("DOMContentLoaded", function (){
    const x = document.getElementById("residenza");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError, { enableHighAccuracy: true });
        } else { 
            x.value = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        x.value = `Latitude: ${lat}, Longitude: ${lon}, Retrieving address...`;

        getAddressFromCoordinates(lat, lon);
    }

    function getAddressFromCoordinates(lat, lon) {
        const xhr = new XMLHttpRequest();
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    x.value = response.display_name;
                } else {
                    x.value = "Error retrieving address.";
                    console.error("Error:", xhr.status);
                }
            }
        };
        xhr.send();
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.value = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                x.value = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                x.value = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                x.value = "An unknown error occurred.";
                break;
        }
    }

    // Make getLocation globally accessible
    window.getLocation = getLocation;
});