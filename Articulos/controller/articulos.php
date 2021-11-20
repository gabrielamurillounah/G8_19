<?php
 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');
    
    header('Content-Type: application/json');

    require_once("../../Config/Conexion.php");  
    require_once("../../Articulos/models/Articulos.php");
    $articulos =new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
            break;
        
        case "GetArticuloID":
            $datos=$articulos->get_articulo($body["id"]);//aqui
            echo json_encode($datos);
            break;
        
        case "InsertArticulos":
            $datos=$articulos->insert_articulos($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
            echo json_encode("Agregado con mucho éxito");
           break; 
        
        case "Delete":  
            $datos=$articulos->delete_articulo($body["id"]);  
            echo json_encode("Articulo Eliminado");   
        break; 
        case "Update":     
            $datos=$articulos->update_articulos($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]); 
            echo json_encode("Articulo Actualizado");
        break;

    }

?>