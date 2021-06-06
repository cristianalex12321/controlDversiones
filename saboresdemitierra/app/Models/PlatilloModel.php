<?php namespace App\Models;

use CodeIgniter\Model;

    class PlatilloModel extends Model{
        protected $table  = 'platillo';
        protected $primaryKey = 'idplatillo';
        protected $returnType = 'array';
        protected $allowedFields = ['nombre','descripcion','precio'];
    }
?>
