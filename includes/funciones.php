<?php


define('TEMPLATES_URL', __DIR__. '/templates');
define('FUNCIONES_URL', __DIR__. 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/' );

function incluirTemplate( string $nombre, bool $inicio = false) {
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
      header('Location: /');
    } 
}

function debuguear($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";

  exit;
}

// Escapa-Sanitizar el html
function s($html): string {
  $s = htmlspecialchars($html);
  return $s;
}

// Validar tipo de contenido
function validarTipoContenido($tipo) {
  $tipos = ['vendedor', 'propiedad'];

  return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificaciones($codigo) {
  $mensaje = '';

  switch($codigo) {
    case 1:
      $mensaje = 'Creado correctamente';
      break;
    case 2:
      $mensaje = 'Actualizado correctamente';
      break;
    case 3:
      $mensaje = 'Eliminado correctamente';
      break;
    default:
      $mensaje = false;
  }
  return $mensaje;
}

function validarORedireccionar(String $url) {
  // Validar que sea un id válido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header("Location: ${url}");
  }

  return $id;
}
