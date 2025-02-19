<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
</head>
<body>
<div class="flex flex-col justify-center h-full rounded-2xl w-50 bg-[#ffffff] shadow-xl">
    <div class="flex flex-col p-8">
        <div class="flex flex-col text-base w-fit">
            <?php
            $latitude = -23.55; 
            $longitude = -46.63; 

            $url = "https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&current_weather=true&hourly=temperature_2m,relative_humidity_2m,wind_speed_10m";

            $response = file_get_contents($url); // pega o conteúdo da url 

            if ($response === FALSE) {
                die('Erro ao buscar dados da API.'); // se não retornar
            }

            $data = json_decode($response, true); // a data é o json 

            if (isset($data['current_weather'])) {
                $currentWeather = $data['current_weather']; // clima
                $temperature = $currentWeather['temperature'];  // temperatura
                $windSpeed = $currentWeather['windspeed']; // velocidade do vento

                echo "Temperatura atual: {$temperature} °C<br>";
                echo "Velocidade do vento: {$windSpeed} km/h<br>";
            } else {
                echo "Dados meteorológicos não encontrados.";
            }
            ?>
        </div>
    </div>
</div>
        </body>
</html>