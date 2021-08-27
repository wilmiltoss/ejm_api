<?php

include_once 'conexion.php';

class Cliente extends DB{
    
    //QUERY
    //todos los clientes
    function obtenerClientes(){
        $query = $this->connect()->query('SELECT * FROM cliente');
        return $query;
    }
    //un solo cliente
        function obtenerCliente($id){
        $query = $this->connect()->prepare('SELECT * FROM Cliente WHERE idcliente = :idcliente');
        $query->execute(['idcliente' => $id]);
        return $query;
    }

    //insertar cliente
      function nuevoCliente($cliente){
        $query = $this->connect()->prepare('INSERT INTO Cliente (nit, nombre, telefono, direccion, usuario_id, estatus) VALUES (:nit, :nombre, :telefono, :direccion, :usuario_id, :estatus)');
        $query->execute(['nit' => $cliente['nit'], 
                      'nombre' => $cliente['nombre'],
                    'telefono' => $cliente['telefono'],
                   'direccion' => $cliente['direccion'],
                  'usuario_id' => $cliente['usuario_id'],
                     'estatus' => $cliente['estatus']
                  ]);
        return $query;
    }


}

?>