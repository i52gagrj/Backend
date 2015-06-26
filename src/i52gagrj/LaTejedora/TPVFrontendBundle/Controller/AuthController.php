<?php

class Auth extends CI_Controller {
  public function login()
  {
    if($this->input->is_ajax_request())
    {
      if(!$this->input->post("email") || !$this->input->post("password"))
      {
        echo json_encode(array("code" => 1, "response" => "Datos insuficientes"));
      }
      $email = $this->input->post("email");
      $password = sha1($this->input->post("password"));
      $this->load->model("auth_model");
      $user = $this->auth_model->login($email, $password);
      if($user !== false)
      {
        //ha hecho login
        $user->iat = time();
        $user->exp = time() + 300;
        $jwt = JWT::encode($user, '');
        echo json_encode(array("code" => 0, "response" => array("token" => $jwt)));
      }
    }
    else
    {
      show_404();
    }	
  }
}
 
