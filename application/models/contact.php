<?php
class contact extends CI_Model{

    public function listar_id($id) {
        $this->db->where("id_user",$id);
        $query = $this->db->get("contactos");
        return $query->result_array();
    }

    public function agregar($datos){
        $this->db->set("id_user",$datos['id_user']);
        $this->db->set("apellido",$datos['apellido']);
        $this->db->set("nombre",$datos['nombre']);
        $this->db->set("email",$datos['email']);
        $this->db->set("tel",$datos['tel']);
        $this->db->insert("contactos");

        return $this->db->insert_id() ;
    }


    public function eliminar($id){
        $this->db->where("id_contacto",$id);
        return $this->db->delete("contactos");
    }
}