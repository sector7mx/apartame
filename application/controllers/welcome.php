<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		// Si la sesion no tiene datos, redireccionarlo fuera del sistema
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/ 
	}


    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return sha1($password);
    }	



	public function index() /*Metodo principal se realiza la validacion 
								*/
	{
		//print $this->__encrip_password('test');

		$ci_session= $this->session->userdata('user_data');
		if ( ! empty($ci_session) ) {
			redirect('welcome/logout');
		}
			
		$this->load->model('tbl_user_model');

		$username = $this->input->post('username');
		$password = $this->__encrip_password($this->input->post('password'));

		$existe = $this->tbl_user_model->verify_user($username,$password);

		if ($existe == TRUE) {
			///llamar al metodo para el tipo de rol para saber a donde tendra permisos de navegacion////
			$reg_rol = $this->tbl_user_model->verify_rol($username,$password);//me guarda el areglo de verify_rol, llamo a la clase tbl_user_model y al metodo

			if ($reg_rol != FALSE) {

				foreach ($reg_rol as $key => $value) {

					if ($key == 'id_tipo') {

						$tipo_r = $value;
					}
				}
				
				switch ($tipo_r) 
				{
				 	case 1://Rol SuperAdministrador
						$newdata= array(
							'username' => $username, 
							'rol' => $tipo_r,
							'id_status' => 1,
							'logged_in'=> TRUE);
						$this->session->set_userdata($newdata);
						//$this->input->set_cookie($newdata);
				 		redirect('dashboard/index');
				 	break;
				 }
			}

			echo "No tienes un rol asignado. Solicitalo a tu Administrador";
			die();
	
		}else{

			redirect('welcome/logout');
		}
		
	}

	public function logout()
	{
		$ci_session= $this->session->userdata('user_data');
		if ( empty($ci_session) ) {
			$newdata= array(
				'username' => NULL, 
				'rol' => NULL,
				'id_status' => NULL,
				'logged_in'=> FALSE);
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
		}
			$data['message_error'] = TRUE;
			$this->load->view('login_view',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */