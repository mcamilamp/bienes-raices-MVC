<?php

namespace Model;

class Propiedad extends ActiveRecord{
  protected static $tabla = 'propiedades';
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones',
  'baño', 'estacionamiento', 'creado', 'vendedores_id'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $baño;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? NULL;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->baño = $args['baño'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
}


public function validar() {
        
    
  if (!$this->titulo) {
      self::$errores[] = "Debes añadir un título";
    }

    if (!$this->precio) {
      self::$errores[] = "El precio es obligatorio";
    }

    if (strlen($this->descripcion) < 50) {
      self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }

    if (!$this->habitaciones) {
     self:: $errores[] = "El número de habitaciones es obligatorio";
    }

    if (!$this->baño) {
      self::$errores[] = "El número de baños es obligatorio";
    }

    if (!$this->estacionamiento) {
      self::$errores[] = "El número de estacionamientos es obligatorio";
    }

    if (!$this->vendedores_id) {
      self::$errores[] = "Debes elegir un vendedor";
    }

    if(!$this->imagen) {
      self::$errores[] = "La imagen es obligatoria";
    }

    return self::$errores;
  }
}