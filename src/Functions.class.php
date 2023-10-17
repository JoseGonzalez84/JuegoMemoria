<?php

class Functions
{
    
    public static function outputFormateado(mixed $dato)
    {
        print_r('<pre>');
        var_dump($dato);
        print_r('</pre>');
    }

    public static function eligePersonajeAzar(int $cantidad)
    {
        return rand(0, $cantidad);
    }
}