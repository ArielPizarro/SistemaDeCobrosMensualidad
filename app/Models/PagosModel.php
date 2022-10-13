<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PagosModel extends Model
    {
        protected $table      = 'pagos';
        protected $primaryKey = 'id';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['id','monto','id_alumno','forma_pago','ano_deuda','folio_boleta','comentario','fecha_pago','fecha_alta','fecha_edit','id_usuario','activo','razon_pago'];
    
        protected $useTimestamps = true;
        protected $createdField  = 'fecha_alta';
        protected $updatedField  = 'fecha_edit';
        protected $deletedField  = '';
    
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
   
    public function obtener($activo = 1)
    {
        $this->select('pagos.*, u.usuario AS cajero, a.nombres AS alumno, a.apellido_paterno AS apellidos, a.apellido_materno AS apematerno, beneficio, a.rut AS idalumno');
        $this->join('usuarios AS u', 'pagos.id_usuario = u.id'); //INNER JOIN
        $this->join('alumnos AS a', 'pagos.id_alumno = a.rutSinDiv'); //INNER JOIN
        $this->where('pagos.activo', $activo);
        $this->orderBy('pagos.fecha_alta', 'DESC');
        $datos = $this->findAll();
        return $datos;
    }

   
   
 

    public function obtenerTotalPagadoMensualidad($activo=1)
    {
        
        $this->select("sum(monto) AS monto");
        $where = "pagos.activo = 1 AND pagos.razon_pago = 'Pago mensualidad año en curso' ";
       // $where = "activo = 1 AND monto > 5";
        return $this->where($where)->first();
    }


    public function totalPagos()
    {
        
        $this->select("sum(monto) AS monto");
        $where = "activo = 1";
       // $where = "activo = 1 AND monto > 5";
        return $this->where($where)->first();
    }


    public function totalMes($fecha)
    {
     
        $this->select("sum(monto) AS monto");
        $fechaUno = date('y-m-01');
       $where = "activo = 1 AND DATE(fecha_alta) >= '$fechaUno' AND DATE(fecha_alta) <= '$fecha'";
        
        return $this->where($where)->first();
    }

    public function totalDia($fecha)
    {
     
        $this->select("sum(monto) AS montoDia");
       $where = "activo = 1 AND DATE(fecha_alta) = '$fecha'";
        
        return $this->where($where)->first();
    }
 
    public function totalPagosXalumno($idAlumno)
    {
        
        $this->select("sum(monto) AS monto");
        $where = "activo = 1 AND id_alumno = '$idAlumno'";
       // $where = "activo = 1 AND monto > 5";
        return $this->where($where)->first();
    }

    }

   

?>