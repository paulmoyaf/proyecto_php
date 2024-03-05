<?php

require_once('conexion.php');


class ClientesDB{
        
        public static function selectAllClientes(){
            try{
                $db = getDBConnection();
                $registros = $db->query("select * from clientes");
                $clientes = array();
    
                while ($registro = $registros->fetch()){
                    $cliente = new Cliente();
                    $cliente->setId($registro['id']);
                    $cliente->setNombre($registro['nombre']);
                    $cliente->setEmail($registro['email']);
                    $cliente->setDireccion($registro['direccion']);
                    $cliente->setCiudad($registro['ciudad']);
                    $cliente->setCodigoPostal($registro['codigoPostal']);
                    $cliente->setTotalProductos($registro['total_productos']);
                    $cliente->setPrecioTotal($registro['precio_total']);
                    $cliente->setCreateDate($registro['create_date']);
                    $cliente->setEstado($registro['estado']);
                    $clientes[] = $cliente;                
                }
    
                return $clientes;
    
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function selectCliente($id){
            try{
                $db = getDBConnection();
                $registros = $db->query("select * from clientes where id = $id");
                $registro = $registros->fetch();
                $cliente = new Cliente();
                $cliente->setId($registro['id']);
                $cliente->setNombre($registro['nombre']);
                $cliente->setEmail($registro['email']);
                $cliente->setDireccion($registro['direccion']);
                $cliente->setCiudad($registro['ciudad']);
                $cliente->setCodigoPostal($registro['codigoPostal']);
                $cliente->setTotalProductos($registro['total_productos']);
                $cliente->setPrecioTotal($registro['precio_total']);
                $cliente->setCreateDate($registro['create_date']);
                $cliente->setEstado($registro['estado']);
                return $cliente;
    
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function insertCliente($cliente){
            try{
                $db = getDBConnection();
                $nombre = $cliente->getNombre();
                $email = $cliente->getEmail();
                $direccion = $cliente->getDireccion();
                $ciudad = $cliente->getCiudad();
                $codigoPostal = $cliente->getCodigoPostal();
                $totalProductos = $cliente->getTotalProductos();
                $precioTotal = $cliente->getPrecioTotal();
                $createDate = $cliente->getCreateDate();
                $estado = $cliente->getEstado();
                $sql = "insert into clientes (nombre, email, direccion, ciudad, codigoPostal, total_productos, precio_total, create_date, estado) values ('$nombre', '$email', '$direccion', '$ciudad', '$codigoPostal', $totalProductos, $precioTotal, '$createDate', '$estado')";
                $count = $db->exec($sql);
                return $count;
    
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function updateCliente($cliente){
            try{
                $db = getDBConnection();
                $id = $cliente->getId();
                $nombre = $cliente->getNombre();
                $email = $cliente->getEmail();
                $direccion = $cliente->getDireccion();
                $ciudad = $cliente->getCiudad();
                $codigoPostal = $cliente->getCodigoPostal();
                $totalProductos = $cliente->getTotalProductos();
                $precioTotal = $cliente->getPrecioTotal();
                $sql = "update clientes set nombre = '$nombre', email = '$email', direccion = '$direccion', ciudad = '$ciudad', codigoPostal = '$codigoPostal', total_productos = $totalProductos, precio_total = $precioTotal where id = $id";
                $count = $db->exec($sql);
                return $count;
    
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }

        public static function eliminarCliente($clienteId){
            try{
                $db = getDBConnection();
                $sql = "delete from clientes where id = $clienteId";
                $count = $db->exec($sql);
                return $count;
        
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }

        public static function cambiarEstadoCliente($clienteId, $estado){
            try{
                $db = getDBConnection();
                $sql = "update clientes set estado = '$estado' where id = $clienteId";
                $count = $db->exec($sql);
                return $count;
        
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    }