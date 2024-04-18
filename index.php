<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch = curl handle
$ch = curl_init((API_URL));
#Indicar que queremos recibir el resultado y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
# Ejecutar la peticion y guardar resultado
$result = curl_exec(($ch));
$data = json_decode($result,true);


curl_close($ch);

# otra alternativa ==> file_get_contents(API_URL);




   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />


    <style>
    :root {
        color-scheme: ligth dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    hgroup {
        text-align: center;
    }
    </style>
</head>

<body>
    <main>

        <section>
            <h2>La proxima pelicula de Marvel</h2>

            <img src="<?=$data["poster_url"]; ?>" width="300" alt="">
        </section>

        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h3>
            <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
            <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
        </hgroup>

    </main>
</body>

</html>