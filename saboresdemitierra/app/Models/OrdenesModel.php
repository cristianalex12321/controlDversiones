<?php namespace App\Models;

use CodeIgniter\Model;

    class OrdenesModel extends Model{
        protected $table  = 'ordenes';
        protected $primaryKey = 'pedido_idpedido';
        protected $returnType = 'array';
        protected $allowedFields = ['platillo_idplatillo','pedido_idpedido','cantidad','subtotal'];

        public function getJoin($id){
            return $this->select('ordenes.platillo_idplatillo as idplatillo, ordenes.cantidad as cantidad, ordenes.subtotal as subtotal,  p.nombre as nombre')
              ->join('platillo as p', 'ordenes.platillo_idplatillo = p.idplatillo')
              ->where('ordenes.pedido_idpedido', $id)
              ->findAll();
        }
    }
?>
