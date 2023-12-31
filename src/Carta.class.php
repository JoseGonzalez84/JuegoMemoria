<?php

/**
 * 
 */
class Carta
{
    public const LISTA_PERSONAJES = [
        1 => 'Bulbasaur',
        2 => 'Ivysaur',
        3 => 'Venusaur',
        4 => 'Charmander',
        5 => 'Charmeleon',
        6 => 'Charizard',
        7 => 'Squirtle',
        8 => 'Wartortle',
        9 => 'Blastoise',
        10 => 'Caterpie',
        11 => 'Metapod',
        12 => 'Butterfree',
        13 => 'Weedle',
        14 => 'Kakuna',
        15 => 'Beedrill',
        16 => 'Pidgey',
        17 => 'Pidgeotto',
        18 => 'Pidgeot',
        19 => 'Rattata',
        20 => 'Raticate',
        21 => 'Spearow',
        22 => 'Fearow',
        23 => 'Ekans',
        24 => 'Arbok',
        25 => 'Pikachu',
        26 => 'Raichu',
        27 => 'Sandshrew',
        28 => 'Sandslash',
        29 => 'Nidoran',
        30 => 'Nidorina',
        31 => 'Nidoqueen',
        32 => 'Nidoran',
        33 => 'Nidorino',
        34 => 'Nidoking',
        35 => 'Clefairy',
        36 => 'Clefable',
        37 => 'Vulpix',
        38 => 'Ninetales',
        39 => 'Jigglypuff',
        40 => 'Wigglytuff',
        41 => 'Zubat',
        42 => 'Golbat',
        43 => 'Oddish',
        44 => 'Gloom',
        45 => 'Vileplume',
        46 => 'Paras',
        47 => 'Parasect',
        48 => 'Venonat',
        49 => 'Venomoth',
        50 => 'Diglett',
        51 => 'Dugtrio',
        52 => 'Meowth',
        53 => 'Persian',
        54 => 'Psyduck',
        55 => 'Golduck',
        56 => 'Mankey',
        57 => 'Primeape',
        58 => 'Growlithe',
        59 => 'Arcanine',
        60 => 'Poliwag',
        61 => 'Poliwhirl',
        62 => 'Poliwrath',
        63 => 'Abra',
        64 => 'Kadabra',
        65 => 'Alakazam',
        66 => 'Machop',
        67 => 'Machoke',
        68 => 'Machamp',
        69 => 'Bellsprout',
        70 => 'Weepinbell',
        71 => 'Victreebel',
        72 => 'Tentacool',
        73 => 'Tentacruel',
        74 => 'Geodude',
        75 => 'Graveler',
        76 => 'Golem',
        77 => 'Ponyta',
        78 => 'Rapidash',
        79 => 'Slowpoke',
        80 => 'Slowbro',
        81 => 'Magnemite',
        82 => 'Magneton',
        83 => 'Farfetch',
        84 => 'Doduo',
        85 => 'Dodrio',
        86 => 'Seel',
        87 => 'Dewgong',
        88 => 'Grimer',
        89 => 'Muk',
        90 => 'Shellder',
        91 => 'Cloyster',
        92 => 'Gastly',
        93 => 'Haunter',
        94 => 'Gengar',
        95 => 'Onix',
        96 => 'Drowzee',
        97 => 'Hypno',
        98 => 'Krabby',
        99 => 'Kingler',
        100 => 'Voltorb',
        101 => 'Electrode',
        102 => 'Exeggcute',
        103 => 'Exeggutor',
        104 => 'Cubone',
        105 => 'Marowak',
        106 => 'Hitmonlee',
        107 => 'Hitmonchan',
        108 => 'Lickitung',
        109 => 'Koffing',
        110 => 'Weezing',
        111 => 'Rhyhorn',
        112 => 'Rhydon',
        113 => 'Chansey',
        114 => 'Tangela',
        115 => 'Kangaskhan',
        116 => 'Horsea',
        117 => 'Seadra',
        118 => 'Goldeen',
        119 => 'Seaking',
        120 => 'Staryu',
        121 => 'Starmie',
        122 => 'Mr. Mime',
        123 => 'Scyther',
        124 => 'Jynx',
        125 => 'Electabuzz',
        126 => 'Magmar',
        127 => 'Pinsir',
        128 => 'Tauros',
        129 => 'Magikarp',
        130 => 'Gyarados',
        131 => 'Lapras',
        132 => 'Ditto',
        133 => 'Eevee',
        134 => 'Vaporeon',
        135 => 'Jolteon',
        136 => 'Flareon',
        137 => 'Porygon',
        138 => 'Omanyte',
        139 => 'Omastar',
        140 => 'Kabuto',
        141 => 'Kabutops',
        142 => 'Aerodactyl',
        143 => 'Snorlax',
        144 => 'Articuno',
        145 => 'Zapdos',
        146 => 'Moltres',
        147 => 'Dratini',
        148 => 'Dragonair',
        149 => 'ragonite',
        150 => 'Mewtwo',
        151 => 'Mew'
    ];


    public function __construct(
        private string $_idCarta,
        private string $_rutaPersonaje,
        private int $_idPersonaje
    ) {
    }

    public function setRutaPersonaje(string $ruta)
    {
        $this->_rutaPersonaje = $ruta;
    }

    public function getRutaPersonaje()
    {
        return $this->_rutaPersonaje;
    }

    public function setIdPersonaje(int $idPersonaje)
    {
        $this->_idPersonaje = $idPersonaje;
    }

    public function getIdPersonaje()
    {
        return $this->_idPersonaje;
    }

    public function setIdCarta(int $idCarta)
    {
        $this->_idCarta = $idCarta;
    }

    public function getIdCarta()
    {
        return $this->_idCarta;
    }

    public function draw()
    {
        //$rutaImagen = sprintf('resources/%s.png', str_pad((string) $this->getIdPersonaje(), 3, '0', STR_PAD_LEFT));
        $rutaImagen = $this->getRutaPersonaje();
        // Para la ruta del cover.
        $carpetaPersonajes = explode('/', $rutaImagen);
        unset($carpetaPersonajes[count($carpetaPersonajes)-1]);
        $carpetaPersonajes = implode('/', $carpetaPersonajes);
        $cover = $carpetaPersonajes.'/cover.png';
        // Identificador de carta.
        $idEstaCarta = $this->_idCarta.'-'.$this->getIdPersonaje();
        $selfStyle = '
        <style>

          .card-box-'.$idEstaCarta.' .card-reverse-'.$idEstaCarta.' {
              transform: rotateY(180deg);
          }

          #card-'.$idEstaCarta.' {
            transform-style: preserve-3d;
            transition: all 0.5s linear;
          }

          #card-'.$idEstaCarta.' .front {
            position: absolute;
            backface-visibility: hidden;
            height: 100%;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: 5px;
          }

          #card-'.$idEstaCarta.' .front .front-image {
            background-image: url('.$cover.');
          }

          #card-'.$idEstaCarta.' .reverse {
            transform: rotateY(180deg);
            backface-visibility: hidden;
          }

        </style>
        ';
        $javascript = '
        <script>
        function cambiaCarta_'.$this->_idCarta.'() {
            if (window.actionEnabled) {
                $(\'#card-'.$idEstaCarta.'\').toggleClass(\'card-reverse-'.$idEstaCarta.'\');
                $(\'#card-'.$idEstaCarta.'\').toggleClass(\'card-reversed\');
                comparaParejas();
            }
        }
        </script>';

        $output = '
        <div class="carta-caja card-box-'.$idEstaCarta.'">
            <div id="card-'.$idEstaCarta.'" class="" onclick="cambiaCarta_'.$this->_idCarta.'()">
                <input type="hidden" name="id-card-'.$idEstaCarta.'" value="'.$this->getIdPersonaje().'" />
                <div class="front"><div class="front-image"></div></div>
                <div class="reverse"><img src="'.$rutaImagen.'" /></div>
            </div>
        </div>
        ';

        return $selfStyle.$javascript.$output;
    }
}





