<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User_model extends Model
{

  public function __construct()
  {
    parent::__construct();
    lava_instance()->database();
  }

  public function get_users()
  {
    return $this->db->table('gmv_users')->get_all();
  }

  public function insert_user($last_name, $first_name, $email, $gender, $address)
  {
    $data = array(
      'gmv_last_name' => $last_name,
      'gmv_first_name' => $first_name,
      'gmv_email' => $email,
      'gmv_gender' => $gender,
      'gmv_address' => $address
    );
    return $this->db->table('gmv_users')->insert($data);
  }

  public function getUserById($id)
  {
    return $this->db->table('gmv_users')->where('id', $id)->get();
  }

  public function update_user($id, $data)
  {
    return $this->db->table('gmv_users')->where('id', $id)->update($data);
  }

  public function delete_user($id)
  {
    return $this->db->table('gmv_users')->where("id", $id)->delete();
  }
}
