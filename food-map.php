<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Finder</title>
    <link rel="stylesheet" href="styles.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="scripts.js" async></script>
</head>

<body>
    <?php 
    include 'header.php';
    ?>


    <div class="map-div">
        
        <p>
            <h2>Food Bank Map</h2>
            See the food banks near you
        </p>

        <div id="map"></div>
    </div>

    <script>
        // Initialize the map and set its view to Nova Scotia  
        const map = L.map('map').setView([45, -63], 7);
        // Add OpenStreetMap tile layer  
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);  
    </script>

</body>

</html>