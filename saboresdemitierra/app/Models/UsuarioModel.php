<?php namespace App\Models;

use CodeIgniter\Model;

    class UsuarioModel extends Model{
        protected $table  = 'usuario';
        protected $primaryKey = 'idusuario';
        protected $returnType = 'array';
        protected $allowedFields = ['nombres','apellidos','direccion','telefono','usuario','contraseña'];
    }
?>
