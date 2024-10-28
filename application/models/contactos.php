<?php
class contactos extends CI_Model{
    public $tabla="clientes";
    
        // Método para obtener todos los registros de una tabla
    public function listar_id($id) {
        $this->db->where("id_user",$id);
        $query = $this->db->get("contactos");
        return $query->result_array();
    }

    public function agregar($datos){
        return $this->db->insert("contactos",$datos);
    }
    public function eliminar($id){
        $this->db->where("id_contacto",$id);
        return $this->db->delete("contactos");
    }
}