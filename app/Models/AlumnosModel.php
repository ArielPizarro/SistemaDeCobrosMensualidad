<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class AlumnosModel extends Model
    {
        protected $table      = 'alumnos';
        protected $primaryKey = 'id';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['id','nombres', 'apellido_paterno', 'apellido_materno', 'rut', 'beneficio', 'curso','activo','rutSinDiv'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_alta';
        protected $updatedField  = 'fecha_edit';
        protected $deletedField  = '';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }



?>