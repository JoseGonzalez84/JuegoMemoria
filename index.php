<?php
require_once "src/Tablero.class.php";
require_once "src/Carta.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>

    </style>
    <title>Juego de Memoria</title>
</head>
<body>
    <?php new Tablero(true); ?>
    <script>
        function comparaParejas() {
            var cartas = $('body').find('.card-reversed');
            if (cartas.length > 1) {
                let idCarta1 = cartas[0].id;
                let idCarta2 = cartas[1].id;
                let tmpIdCarta1 = idCarta1.split('-');
                let tmpIdCarta2 = idCarta2.split('-');
                if (tmpIdCarta1[2] === tmpIdCarta2[2]) {
                    console.log('parejas!');
                    $('#'+idCarta1).removeAttr('onclick').removeClass('card-reversed');
                    $('#'+idCarta2).removeAttr('onclick').removeClass('card-reversed');
                } else {
                    console.log('No es lo mismo');
                    $('#'+idCarta1).removeClass('card-reversed card-reverse-'+tmpIdCarta1[1]+'-'+tmpIdCarta1[2]);
                    $('#'+idCarta2).removeAttr('card-reversed card-reverse-'+tmpIdCarta2[1]+'-'+tmpIdCarta2[2]);
                }
            }
        }
    </script>
</body>

</html>