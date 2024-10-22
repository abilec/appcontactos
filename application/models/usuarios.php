<?php
class usuarios extends CI_Controller {
    public function check_login($nombre, $clave)
    {
        $this->db->select("id_user");
        $this->db->where("nombre", $nombre);
        $this->db->where("clave", md5($clave));
        $query = $this->db->get("usuarios");
        if ($query->num_rows() > 0) {
            $tmp = $query->row_array();
            return $tmp["id_user"];
        } else {
            return false;
        }
    }
    public function get_byId($id){
        $this->db->select("usuarios.*");
        $this->db->from("usuarios");
        $this->db->where("id_user", $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    
}