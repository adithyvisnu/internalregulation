<?php
  class Model_pekerjaan extends CI_Model {

      public $table = 'pekerjaan';

    public function get()
    {
      $query = $this->db->get($this->table);

      return $query;
    }

    public function get_offset($limit, $offset)
    {
      $query = $this->db
        ->limit($limit, $offset)
        ->get($this->table);

      return $query;
    }

    public function get_where($where)
    {
      $query = $this->db
        ->where($where)
        ->get($this->table);

      return $query;
    }

    public function insert($data)
    {
      $query = $this->db->insert($this->table, $data);

      return $query;
    }

    public function update($id_pekerjaan, $data)
    {
      $query = $this->db
        ->where('id_pekerjaan', $id_pekerjaan)
        ->update($this->table, $data);

      return $query;
    }

    public function delete($id_pekerjaan)
    {
      $query = $this->db
        ->where('id_pekerjaan', $id_pekerjaan)
        ->delete($this->table);

      return $query;
    }

  }
