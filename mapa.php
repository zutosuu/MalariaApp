<?php 
session_start();
include("app/bd.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Costa Rica</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include("templates/nav.php"); ?>
    <!-- Contenedor del mapa -->
    <br><br>
    <div id="map"></div>
    <!-- Información de coordenadas -->
    <select name="año" id="year-select">
        <option value="2022">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
    </select>
    <div id="total-cases">Casos Reportados en Agosto: 401</diV>
    <div id="coordinates">Latitud: 0.000000<br>Longitud: 0.000000</div>

    <script>
        // Inicializar el mapa centrado en Costa Rica
        var mymap = L.map('map').setView([9.7489, -83.7534], 8);

        // Agregar una capa de mapas base (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        // Coordenadas del centro de las provincias de Costa Rica
        var provincias = [
            { nombre: 'San José', coordenadas: [9.48, -83.87] },
            { nombre: 'Alajuela', coordenadas: [10.6172, -84.5147] },
            { nombre: 'Cartago', coordenadas: [9.84, -83.69] },
            { nombre: 'Heredia', coordenadas: [10.46, -84] },
            { nombre: 'Guanacaste', coordenadas: [10.40, -85.41] },
            { nombre: 'Puntarenas', coordenadas: [9.98, -84.82] },
            { nombre: 'Limón', coordenadas: [10.16, -83.34] }
        ];

        // Variable para almacenar casos
        casos = ['Baja Incidencia', 'Alta Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Alta Incidencia', 'Alta Incidencia'];

        // Función para actualizar los marcadores en el mapa
        function actualizarMarcadores() {
            for (var i = 0; i < provincias.length; i++) {
                var provincia = provincias[i];
                var caso = casos[i];
                var marker = L.marker(provincia.coordenadas).addTo(mymap);
                marker.bindPopup('<center>' + provincia.nombre + '<br><b style="color:red;">' + caso + '</b></center>').openPopup();
            }
        }

        // Función para actualizar las coordenadas en la información
        function updateCoordinates(e) {
            document.getElementById('coordinates').innerHTML = 'Latitud: ' + e.latlng.lat.toFixed(6) + '<br>Longitud: ' + e.latlng.lng.toFixed(6);
        }

        // Agregar un manejador de eventos para mostrar las coordenadas al mover el mouse sobre el mapa
        mymap.on('mousemove', updateCoordinates);

        // Obtén una referencia al elemento select
        var select = document.getElementById("year-select");
        var totalCases = document.getElementById("total-cases");

        // Agrega un manejador de eventos para el cambio de select
        select.addEventListener("change", function() {
            // Obtén el valor seleccionado
            var valorSeleccionado = select.value;

            // Actualiza los casos según el año seleccionado
            if (valorSeleccionado === "2023") {
                totalCases.innerHTML = 'Casos reportados en agosto: 401';
                casos = ['Baja Incidencia', 'Alta Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Alta Incidencia', 'Alta Incidencia'];
            } else if (valorSeleccionado === "2022") {
                totalCases.innerHTML = 'Casos Totales: 455';
                casos = ['Baja Incidencia', 'Alta Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Alta Incidencia', 'Alta Incidencia'];
            } else if (valorSeleccionado === "2021") {
                totalCases.innerHTML = 'Casos Totales: 189';
                casos = ['Baja Incidencia', 'Alta Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Alta Incidencia', 'Alta Incidencia'];
            } else if (valorSeleccionado === "2020") {
                totalCases.innerHTML = 'Casos Totales: 90';
                casos = ['0', '30', '0', '0', '0', '0', '1'];
            } else if (valorSeleccionado === "2019") {
                totalCases.innerHTML = 'Casos Totales: 145';
                casos = ['0', '88', '0', '0', '0', '4', '3'];
            }else if (valorSeleccionado === "2018") {
                totalCases.innerHTML = 'Casos Totales: 108';
                casos = ['Baja Incidencia', 'Alta Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Baja Incidencia', 'Alta Incidencia', 'Alta Incidencia'];
            };

            // Limpia los marcadores existentes en el mapa
            mymap.eachLayer(function(layer) {
                if (layer instanceof L.Marker) {
                    mymap.removeLayer(layer);
                }
            });

            // Actualiza los marcadores con los nuevos casos
            actualizarMarcadores();
        });

        // Inicialmente, carga los marcadores con los casos del año 2020
        actualizarMarcadores();
    </script>
</body>

</html>
