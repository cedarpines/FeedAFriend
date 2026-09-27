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
        
        <h2>Food Bank Map</h2>
        <p>
            Find a Feed Nova Scotia food bank near you!
        </p>

        <div id="map"></div>
    </div>

    <script>
        // create food bank coords
        var coords = [
            [45.950870513916016, -60.89937973022461],
            [44.65767288208008, -63.62158966064453],
            [44.7651319, -63.6497983],
            [45.0439068, -64.7219728],
            [44.8404875, -65.2917173],
            [44.3764965, -64.525456],
            [44.6528574, -63.5810688],
            [45.1590315, -64.4196405],
            [46.0163358, -61.5309263],
            [45.9211674, -59.9697157],
            [44.6680634, -63.5678768],
            [44.2427157, -66.1316632],
            [45.3653669, -63.283914],
            [44.6715884, -63.4780895],
            [44.6313145, -63.5815278 ],
            [44.6367223, -63.5892308 ],
            [44.6791075, -63.5885253],
            [44.6446397, -63.5747389 ],
            [44.6787025, -63.5264856],
            [44.6091775, -63.6200541],
            [44.78493, -63.146459],
            [44.5999264, -63.6131262],
            [44.6672234, -63.5679353],
            [45.0847192, -64.4817895],
            [44.7777606, -63.6954408],
            [46.1954304, -59.953819 ],
            [45.3865158, -61.5048697],
            [44.6509515, -63.6489945],
            [45.237, -63.571],
            [45.0688678, -64.1759688 ]

        ];
        var marker;

        

        // Initialize the map and set its view to Nova Scotia  
        const map = L.map('map').setView([45, -63], 7);
        // Add OpenStreetMap tile layer  
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);  

        // Assign markers
        for (var i = 0; i < coords.length; i++){
            marker = new L.marker([coords[i][0], coords[i][1]]).addTo(map);
        };

    </script>

</body>

</html>