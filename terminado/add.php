<?php

    include_once 'api_rest.php';
    
    $api = new ApiClientes();
    $nombre = '';
    $nit = '';

    if(isset($_POST['nombre']) && isset($_POST['nit'])){ //validamos que las variables existan

            $item = array(
                'nit' => $_POST['nit'],
             'nombre' => $_POST['nombre'],
           'telefono' => $_POST['telefono'],
          'direccion' => $_POST['direccion'],
         'usuario_id' => $_POST['usuario_id'],
            'estatus' => $_POST['estatus']
            );
            $api->add($item);
    
    }else{
        $api->error('Error al llamar a la API');
    }


    
?>