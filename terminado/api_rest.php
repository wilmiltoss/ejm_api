<?php
//MANEJA EL COMPORTAMIENTO DEL API
include_once 'query.php';

class ApiClientes{

//OBTENEMOS EL RESULTADO
    //API CONSULTA CLIENTE TODOS
    function getAll(){
        $cliente = new Cliente();//creo un objeto Cliente
        $clientes = array();
        $clientes["items"] = array();//convierto en un array

        $res = $cliente->obtenerClientes(); //LLAMA A LA FUNCION DE cliente.php

        if($res->rowCount()){//SI $res ES MAYOR A 0
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "idcliente" => $row['idcliente'],
                    "cedula" => $row['nit'],
                    "nombre" => $row['nombre'],
                    "telefono" => $row['telefono'],
                    "direccion" => $row['direccion']
                );
                array_push($clientes["items"], $item);
            }
        
            $this->printJSON($clientes);
           // echo json_encode($clientes);


        }else{
            echo json_encode(array('mensaje' => 'No hay elementos registrados'));
        }
    }
        //API CONSULTA CLIENTE POR ID
        function getById($id){
        $cliente = new Cliente();//creo un objeto Cliente
        $clientes = array();
        $clientes["items"] = array();

        $res = $cliente->obtenerCliente($id); //LLAMA A LA FUNCION DE cliente.php

        if($res->rowCount() == 1){//validamos que sea solo un elemento
            $row = $res->fetch();
            $item=array(
                "idcliente" => $row['idcliente'],
                "cedula" => $row['nit'],
                "nombre" => $row['nombre'],
                "telefono" => $row['telefono'],
                "direccion" => $row['direccion']
            );
            array_push($clientes["items"], $item);
            $this->printJSON($clientes);
        }else{
            $this->error('No hay elementos');
        }
    }

    //API AGREGAR CLIENTE
    function add($item){
        $cliente = new Cliente();

        $res = $cliente->nuevoCliente($item);
        $this->exito('Nuevo cliente registrado');
    }

     //mensaje de error
     function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    //mensaje de exito
    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

}

?>