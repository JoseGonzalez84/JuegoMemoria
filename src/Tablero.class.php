<?php

/**
 * 
 */
class Tablero
{
    private array $_contenido;
    private string $_carpetaPersonajesSeleccionada;
    private array $_carpetasRecursos = [];
    private string $_carpetaPersonajes;
    private array $_listadoPersonajes;
    private int $_cartasLineas;
    private int $_cartasColumnas;
    public const CARTAS_LINEAS = 4;
    public const CARTAS_COLUMNAS = 6;
    public const NUMERO_CARTAS = self::CARTAS_LINEAS * self::CARTAS_COLUMNAS;


    public function __construct(array $parametros, bool $draw=false)
    {
        $this->setRutaPersonajes($parametros['rutaPersonajes']);
        $this->setLineas($parametros['lineas']);
        $this->setColumnas($parametros['columnas']);
        // Si se solicita grabar directamente, se hace.
        if ($draw === true) {
            echo $this->draw();
        }
    }


    public function setLineas(int $lineas)
    {
        $this->_cartasLineas = $lineas;
    }


    public function setColumnas(int $columnas)
    {
        $this->_cartasColumnas = $columnas;
    }


    public function getLineas()
    {
        return $this->_cartasLineas;
    }


    public function getColumnas()
    {
        return $this->_cartasColumnas;
    }

    public function setRutaPersonajes(string $ruta)
    {
        // Si por lo que sea no existe...
        if (is_dir('resources/'.$ruta) === false) {
            $ruta = 'pokemon';
        }
        $this->_carpetaPersonajes = 'resources/'.$ruta;
        // Establecemos el nombre seleccionado.
        $this->_carpetaPersonajesSeleccionada = $ruta;
        // Obtenemos el contenido de la carpeta de recursos.
        foreach (scandir($this->_carpetaPersonajes) as $fichero) {
            if ($fichero !== '.' && $fichero !== '..' && $fichero !== 'cover.png') {
                $this->_listadoPersonajes[] = $fichero;
            }
        }
    }

    public function draw()
    {
        // Se van a obtener los identificadores de las cartas para jugar.
        $cartasJuego = [];
        $numeroCartas = ($this->getColumnas()*$this->getLineas()) / 2;
        for ($i=0; $i < $numeroCartas; $i++) {
            $personajeAleatorio = Functions::eligePersonajeAzar(count($this->_listadoPersonajes)-1);
            if (in_array($personajeAleatorio, $cartasJuego) === false) {
                $cartasJuego[] = $personajeAleatorio;
                $cartasJuego[] = $personajeAleatorio;
            } else {
                $i--;
            }
        }
        //var_dump($cartasJuego);
        // Se mezclan.
        shuffle($cartasJuego);
        // Se dibuja el tablero.
        $tablero = '';
        // Se dibuja el hueco donde iran las cartas.
        $cartasCompletas = '<div class="tablero">';
        for ($i=0; $i < $this->getColumnas(); $i++) {
            $cartasCompletas .= '<div class="tablero-columna">';
            for ($l=0; $l < $this->getLineas(); $l++) {
                $idCarta = ($i.$l);
                $cartaElegida = array_pop($cartasJuego);
                $carta = new Carta($idCarta, $this->_carpetaPersonajes.'/'.$this->_listadoPersonajes[$cartaElegida], $cartaElegida);
                $cartasCompletas .= $carta->draw();
            }
            $cartasCompletas .= '</div>';
        }
        $cartasCompletas .= '</div>';
        // Cartas sobre el tablero.
        $tablero .= $cartasCompletas;

        return $tablero;
    }
}