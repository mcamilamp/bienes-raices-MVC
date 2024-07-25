<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class VendedorControllers {
    public static function crear(Router $router) {
        $vendedores = new Vendedor;
        $errores =Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
        
            // Validar que no haya campos vacíos
            $errores = $vendedor->validar();
        
            // No hay errores
            if(empty($errores)) {
            $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $errores =Vendedor::getErrores();
        $id = validarORedireccionar('/admin');
        // Obtener datos del vendedor
        $vendedor = Vendedor::find($id);

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los valores
            $args = $_POST['vendedor'];
        
            // Sincronizar objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);
        
            // validación
            $errores = $vendedor->validar();
            
            if(empty($errores)) {
            $vendedor->guardar();
        }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];
                
                if(validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}