<?php

class Menu
{
    private string $_carpetaPersonajes;
    private int $_cantidadCartas;
    private int $_cantidadJugadores;
    private string $_formJugarName = 'formJugar';
    private array $_cantidadesParaCartas = [
        '2*4' => 8,
        '4*4' => 16,
        '4*6' => 24
    ];

    public function __construct()
    {
        if (isset($_POST['personajes']) === true) {
            $this->_carpetaPersonajes = $_POST['personajes'];
        } else {
            $this->_carpetaPersonajes = 'pokemon';
        }

        if (isset($_POST['cantidadCartas']) === true) {
            $this->_cantidadCartas = $_POST['cantidadCartas'];
        } else {
            $this->_cantidadCartas = '24';
        }

        if (isset($_POST['cantidadJugadores']) === true) {
            $this->_cantidadJugadores = $_POST['cantidadJugadores'];
        } else {
            $this->_cantidadJugadores = '1';
        }

        $this->draw();
    }

    public function getCarpetasRecursos() {
        return $this->_carpetaPersonajes;
    }

    private function getCarpetasRecursosSelector()
    {
        $opciones = [];
        // Obtenemos el contenido de la carpeta de recursos.
        foreach (scandir('resources') as $directorio) {
            if ($directorio !== '.' && $directorio !== '..') {
                if (is_dir('resources/'.$directorio) === true) {
                    $seleccionado = ($this->_carpetaPersonajes === strtolower($directorio)) ? 'selected ' : '';
                    $opciones[] = '<option '.$seleccionado.'value="'.strtolower($directorio).'">'.strtoupper($directorio).'</option>';
                }
            }
        }

        //$opciones .= '  <form id="seleccionPersonajes" method="POST" action="#">';
        return sprintf(
            '<div class="select"><select form="%s" name="personajes">%s</select></div>',
            $this->_formJugarName,
            implode('', $opciones)
        );
    }


    public function getCantidadCartas()
    {
        return $this->_cantidadCartas;
    }

    private function getCantidadCartasSelector()
    {
        $opciones = [];
        $cantidades = [
            '2*4' => 8,
            '4*4' => 16,
            '4*6' => 24
        ];
        // Obtenemos el contenido de la carpeta de recursos.
        $cantidades = $this->_cantidadesParaCartas;
        foreach ($cantidades as $value => $valorVisible) {
            $seleccionado = ($this->getCantidadCartas() === $cantidad) ? 'selected ' : '';
            $opciones[] = '<option '.$seleccionado.'value="'.$value.'">'.$valorVisible.'</option>';
        }

        return sprintf(
            '<div class="select"><select form="%s" name="cantidadCartas">%s</select></div>',
            $this->_formJugarName,
            implode('', $opciones)
        );
    }

    public function getCantidadJugadores()
    {
        return $this->_cantidadJugadores;
    }

    private function getCantidadJugadoresSelector()
    {
        $opciones = [];
        $cantidades = [1, 2, 3];
        // Obtenemos el contenido de la carpeta de recursos.
        foreach ($cantidades as $cantidad) {
            $seleccionado = ($this->getCantidadJugadores() === $cantidad) ? 'selected ' : '';
            $opciones[] = '<option '.$seleccionado.'value="'.$cantidad.'">'.$cantidad.'</option>';
        }

        return sprintf(
            '<div class="select"><select form="%s" name="cantidadJugadores">%s</select></div>',
            $this->_formJugarName,
            implode('', $opciones)
        );
    }

    public function getValorCantidadCartas()
    {
        return []
    }

    public function draw()
    {
        $listadoPersonajes = $this->getCarpetasRecursosSelector();
        $cantidadCartas = $this->getCantidadCartasSelector();
        $cantidadJugadores = $this->getCantidadJugadoresSelector();
        ob_start();
        ?>
        <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="http://memorygato.260mb.net/">
            <img src="resources/brand.jpg" style="max-height: inherit;width: 4rem;">
          </a>

          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <form action="#" id="formJugar" method="post"></form>
            <a class="navbar-item">
            <span>Personajes</span>&nbsp;<?php echo $listadoPersonajes; ?>
            </a>

            <a class="navbar-item">
            <span>Cantidad</span>&nbsp;<?php echo $cantidadCartas; ?>
            </a>

            <a class="navbar-item">
            <span>Jugadores</span>&nbsp;<?php echo $cantidadJugadores; ?>
            </a>
          </div>

          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <button onclick="$('#formJugar').submit()" class="button is-primary">
                  <strong>¡JUGAR!</strong>
                </button>
              </div>
            </div>
          </div>
        </div>
      </nav>
    <?php
        $menu = ob_get_clean();

        echo $menu;


    }
}