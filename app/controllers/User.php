<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->call->model('User_model');
  }

  public function index()
  {
    $data['users'] = $this->User_model->get_users();
    $this->call->view('main', $data);
  }

  //=== CREATE USER ===//
  public function create_user()
  {
    $last_name = $this->io->post('gmv_last_name');
    $first_name = $this->io->post('gmv_first_name');
    $email = $this->io->post('gmv_email');
    $gender = $this->io->post('gmv_gender');
    $address = $this->io->post('gmv_address');

    if ($this->User_model->insert_user($last_name, $first_name, $email, $gender, $address)) {
      echo json_encode(['status' => 'success', 'message' => 'User added successfully']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to add user']);
    }
  }

  //=== EDIT USER ===//
  public function edit_user($id)
  {
    $user = $this->User_model->getUserById($id);

    if ($user) {
      echo json_encode(['status' => 'success', 'user' => $user]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }

    header('Content-Type: application/json');
  }

  //=== UPDATE USER ===//
  public function update_user($id)
  {
    $data = array(
      'gmv_last_name' => $this->io->post('gmv_last_name'),
      'gmv_first_name' => $this->io->post('gmv_first_name'),
      'gmv_email' => $this->io->post('gmv_email'),
      'gmv_gender' => $this->io->post('gmv_gender'),
      'gmv_address' => $this->io->post('gmv_address')
    );

    if ($this->User_model->update_user($id, $data)) {
      echo json_encode(['status' => 'success', 'message' => 'User updated successfully']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to update user']);
    }
  }

  //=== DELETE USER ===//
  public function delete_user($id)
  {
    if ($this->User_model->delete_user($id)) {
      echo json_encode(['success' => true, 'message' => 'User deleted successfully.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Failed to delete user.']);
    }

    header('Content-Type: application/json');
  }

  //=== GET ALL ===//
  public function get_all()
  {
    $users = $this->User_model->get_users();
    if (!empty($users)) {
      echo json_encode(['status' => 'success', 'users' => $users]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'No users found']);
    }
  }
}
