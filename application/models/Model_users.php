<?php
  class Model_users extends CI_Model {

    public $table = 'users';


    public function cekAkun($username, $password)
    {
      // Get data user yang mempunyai username == $username dan active == 1
			$this->db->where('username', $username);
			$this->db->where('active', '1');

      // Jalankan query
      $query = $this->db->get($this->table)->row();

      // Jika query gagal atau tidak menemukan username yang sesuai
      // maka return false
			if (!$query) return false;

      // Ambil data password dari database
      $hash = $query->password;

      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;

      // Update last_login user
      $last_login = $this->update($query->id_user, array('last_login' => date('Y-m-d H:i:s')));

      // Jika username dan password benar maka return data user
      return $query;
    }

    public function cekPasswordLama($id_user, $password)
    {
      // Get data user yang mempunyai id == $id dan active == 1
			$this->db->where('id_user', $id_user);
			$this->db->where('active', '1');

      // Jalankan query
      $query = $this->db->get($this->table)->row();

      // Jika query gagal atau tidak menemukan data yang sesuai
      // maka return false
			if (!$query) return false;

      // Ambil data password dari database
      $hash = $query->password;

      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;

      // Jika username dan password benar maka return data user
      return $query;
    }

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function update($id_user, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_user', $id_user)
        ->update($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function delete($id_user)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_user', $id_user)
        ->delete($this->table);

      // Return hasil query
      return $query;
    }

  }
