<?php

require_once('conexion.php');


class PedidosDB{
    
        public static function selectPedidos(){
            try{
                $db = getDBConnection();
                $registros = $db->query("select * from pedidos");
                $pedidos = array();
    
                while ($registro = $registros->fetch()){
                    $pedido = new Pedido();
                    $pedido->setId($registro['id']);
                    $pedido->setClienteId($registro['cliente_id']);
                    $pedido->setProductoId($registro['producto_id']);
                    $pedido->setCantidad($registro['cantidad']);
                    $pedido->setCreateDate($registro['create_date']);
                    $pedido->setEstado($registro['estado']);
                    $pedidos[] = $pedido;                
                }
    
                return $pedidos;
    
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function selectPedido($id){
            try{
                $db = getDBConnection();
                $registros = $db->query("select * from pedidos where id = $id");
                if ($registro = $registros->fetch()){
                    $pedido = new Pedido();
                    $pedido->setId($registro['id']);
                    $pedido->setClienteId($registro['cliente_id']);
                    $pedido->setProductoId($registro['producto_id']);
                    $pedido->setCantidad($registro['cantidad']);
                    $pedido->setCreateDate($registro['create_date']);
                    $pedido->setEstado($registro['estado']);
                    return $pedido;
                } else {
                    return false;
                }
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function removePedido($pedido){
            try{
                $db = getDBConnection();
                $id = $pedido->getId();
                $registros = $db->query("delete from pedidos where id = $id");
                return $registros->rowCount();
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    
        public static function updatePedido($pedido){
            try{
                $db = getDBConnection();
                $id = $pedido->getId();
                $clienteId = $pedido->getClienteId();
                $productoId = $pedido->getProductoId();
                $cantidad = $pedido->getCantidad();
                $createDate = $pedido->getCreateDate();
                $estado = $pedido->getEstado();
                $registros = $db->query("update pedidos set cliente_id = $clienteId, producto_id = $productoId, cantidad = $cantidad, create_date = '$createDate', estado = '$estado' where id = $id");
                return $registros->rowCount();
            } catch (Exception $e){
                echo "<p>Error:" .$e->getMessage() . "</p>\n";
                return null;
            }
        }
    }