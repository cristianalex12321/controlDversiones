<?php namespace App\Models;

use CodeIgniter\Model;

    class PedidosModel extends Model{
        protected $table  = 'pedido';
        protected $primaryKey = 'idpedido';
        protected $returnType = 'array';
        protected $allowedFields = ['fecha','total','Cantidad','usuario_idusuario'];

        public function getJoin($id){
            return $this->select('pedido.idpedido , pedido.fecha, pedido.total, u.nombres as nombres, u.direccion as direccion')
              ->join('usuario as u', 'pedido.usuario_idusuario = u.idusuario')
              ->where('pedido.usuario_idusuario', $id)
              ->findAll();
        }
    }

    
?>
