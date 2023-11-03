<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "src/Menu.class.php";
require_once "src/Tablero.class.php";
require_once "src/Carta.class.php";
require_once "src/Functions.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3f787ec5e9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>
        .tablero {
            display: flex;
            width: 100%;
            margin: 0 auto;
            justify-content: center;
            padding: 0 1rem;
        }
        .tablero-columna {
            flex: 1 1 auto;
        }
        .carta-caja {
            width: 100%;
            position: relative;
            perspective: 1000px;
            padding: 0.5rem;
        }

        .carta-caja>div {
            border: 4px solid;
            border-radius: 8px;
        }

        .card-reversed {
            box-shadow: none;
        }

        .front {
            box-shadow: inset 0 0 0 1.5em #aab4f4;
        }

        .front .front-image {
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }
        .reverse {
            height: 150px;
            display: flex;
            align-items: center;
            box-shadow: none;
        }
        .reverse>img {
            max-height: 100%;
            margin: 0 auto;
        }
    </style>
    <title>Juego de Memoria</title>
</head>
<body>
    <?php
        $menu = new Menu();
        list($lineas, $columnas) = $menu->getValorCantidadCartas();
        $parametros = [
            'lineas' => $lineas,
            'columnas' => $columnas,
            'rutaPersonajes' => $menu->getCarpetasRecursos()
        ];
        $tablero = new Tablero($parametros, true);
        ?>
    <script>
        window.actionEnabled = true;
        function comparaParejas() {
            var cartas = $('body').find('.card-reversed');
            if (cartas.length > 1) {
                let idCarta1 = cartas[0].id;
                let idCarta2 = cartas[1].id;
                let tmpIdCarta1 = idCarta1.split('-');
                let tmpIdCarta2 = idCarta2.split('-');
                window.actionEnabled = false;
                if (tmpIdCarta1[2] === tmpIdCarta2[2]) {
                    console.log('parejas!');
                    $('#'+idCarta1).removeAttr('onclick').removeClass('card-reversed');
                    $('#'+idCarta2).removeAttr('onclick').removeClass('card-reversed');
                    window.actionEnabled = true;
                } else {
                    console.log('No es lo mismo');
                    setTimeout(function(){
                        $('#'+idCarta1).removeClass('card-reversed card-reverse-'+tmpIdCarta1[1]+'-'+tmpIdCarta1[2]);
                        $('#'+idCarta2).removeClass('card-reversed card-reverse-'+tmpIdCarta2[1]+'-'+tmpIdCarta2[2]);
                        window.actionEnabled = true;
                    }, 2000);
                }
            }
        }
    </script>
    <a href="https://www.freepik.es/vector-gratis/lindo-gato-superheroe-vuelo_15769532.htm#fromView=search&term=felix+cat&page=1&position=10&track=ais&regularType=vector">Imagen de catalyststuff</a> en Freepik
</body>

</html>