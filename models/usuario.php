<?php

namespace Model;

class Usuario extends ActiveRecord {
    //BBDD
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre; 
    public $apellido; 
    public $email;
    public $password;
    public $telefono; 
    public $admin; 
    public $confirmado; 
    public $token;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? ''; 
        $this->apellido = $args['apellido'] ?? ''; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
        $this->telefono = $args['telefono'] ?? ''; 
        $this->admin = $args['admin'] ?? 0; 
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? ''; 
    }

    // Msj de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El telefono es Obligatorio';
        }
        
        return self::$alertas;

    }

    public function validarLogin() {
        if(!$this->email){
            self::$alertas['error'][] = 'El E-mail es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'La Contraseña es Obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email){
            self::$alertas['error'][] = 'El E-mail es Obligatorio';
        }
        
        return self::$alertas;
    }

    // Comprueba si el usuario existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this-> email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario "' . $this-> email . '", ya esta registrado';
        }
        
        return $resultado;
    }

    public function hashPassword() {
        $this -> password = password_hash($this -> password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this -> token = uniqid();
    }

    public function tokenAndPasswordVerificado($password) {        
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        }else {
            return true;
        }
    }

}