<?php

/**
 * 
 */
class Tablero
{
    private array $_contenido;
    public const NUMERO_CARTAS = 24;

    private function outputFormateado(mixed $dato) {
        print_r('<pre>');
        var_dump($dato);
        print_r('</pre>');
    }

    public function __construct(bool $draw=false)
    {
        if ($draw === true) {
            echo $this->draw();
        }
    }

    public function draw()
    {
        // Se van a obtener los identificadores de las cartas para jugar.
        $cartasJuego = [];
        for ($i=0; $i < (self::NUMERO_CARTAS / 2); $i++) {
            $personajeAleatorio = Carta::eligePersonajeAzar();
            if (in_array($personajeAleatorio, $cartasJuego) === false) {
                $cartasJuego[] = $personajeAleatorio;
                $cartasJuego[] = $personajeAleatorio;
            } else {
                $i--;
            }
        }
        // Se mezclan.
        shuffle($cartasJuego);
        // Se dibuja el tablero.
        $cartasCompletas = '<div style="display: flex;width: 75%;margin: 0 auto;">';
        for ($i=0; $i < 6; $i++) {
            $cartasCompletas .= '<div style="flex: 1 1 auto;">';
            for ($l=0; $l < 4; $l++) {
                $idCarta = ($i.$l);
                $cartaElegida = array_pop($cartasJuego);
                $carta = new Carta($idCarta, $cartaElegida);
                $cartasCompletas .= $carta->draw();
            }
            $cartasCompletas .= '</div>';
        }
        $cartasCompletas .= '</div>';

        return $cartasCompletas;
    }
}