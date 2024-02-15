<?php

namespace Model;

class Servicio extends ActiveRecord {
    // Base de Datos

    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];


    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? 0.0;
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][]  = "El nombre del servicio es obligatorio.";
        }
        if(!$this->precio) {
            self::$alertas['error'][]  = "El precio del servicio es obligatorio.";
        }
        if(!is_numeric($this->precio)) {
            self::$alertas['error'][]  = "No es un formato valido para el precio, debe ser numérico.";
        }

        return self::$alertas;
    }

}