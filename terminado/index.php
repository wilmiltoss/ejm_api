<?php
    include_once 'api_rest.php';

    $api = new ApiClientes();//llama a la clase ApiClientes

     if(isset($_GET['idcliente'])){
        $id = $_GET['idcliente'];

        if(is_numeric($id)){ //si es numerico
            $api->getById($id);
        }else{
            $api->error('El id debe ser numerico');
        }
    }else{
         //$api->getAll();
       $api->error('Debes ingresar un parametro');
    }
    
?>