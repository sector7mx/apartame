<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		// Se Definen constantes para facilitar la programacion
	    define('USER',$this->session->userdata('username'));
	    //

  		$this->load->model('tbl_roles_model');
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('dashboard_view');
		$this->load->view('footer');				
	}

    function getcurldata() {
        $API_KEY = '74ee9058d2f4beb1e3e8b250a6e5d788';
        $SECRET = '3002afbedd3863e3b94c9d8dd085011c';
        $STORE_URL = 'testonlinestore-5.myshopify.com';
        // code = be69378b8959cab92869c98cf7525758;

        /** 
        * Cuando se instala la App se redirecciona y se obtiene un codigo de confirmacion de instalacion
        * http://luisgvillasenor.com/?code=be69378b8959cab92869c98cf7525758&hmac=f86cfd12ad7a6a9f800749fa6051cb8765ab83a6b8c1a346fceb4089653141ec&shop=testonlinestore-5.myshopify.com&signature=0cb711ede8f065592b565c7f70be3085&timestamp=1438135206
        *
        * https://testonlinestore-5.myshopify.com/admin/oauth/access_token?client_id=74ee9058d2f4beb1e3e8b250a6e5d788&client_secret=3002afbedd3863e3b94c9d8dd085011c&code=be69378b8959cab92869c98cf7525758
        *
        */

        //$url = 'http://luisgvillasenor.com/?hmac=3b1fbd2d2b299601e07718125f0bf9d66dbc61255dc295844388c95d0dc7654d&shop=testonlinestore-5.myshopify.com&signature=25c6173cf4f6cd2dd137759da513a084&timestamp=1438132026';
		
		/**
		* App Apartame3 en testonlinestore-5
		*
		* APIKey.- 0bd36509a80bf336abef230c4e5f0ede
		*
		* Password.- b0b828477c78249b54a5ed75ad15fda3
		*
		* Shared Secret.- 0552263a8ac585ddd28727d439f2baeb
		*
		* URL Format.- https://apikey:password@hostname/admin/resource.json
		*
		* Example URL.- https://0bd36509a80bf336abef230c4e5f0ede:b0b828477c78249b54a5ed75ad15fda3@testonlinestore-5.myshopify.com/admin/orders.json
		*
		*/

		$url = 'https://0bd36509a80bf336abef230c4e5f0ede:b0b828477c78249b54a5ed75ad15fda3@testonlinestore-5.myshopify.com/admin/orders.json?fields=created_at,id,name,total-price,financial_status';
        $session = curl_init();
        curl_setopt($session, CURLOPT_URL, $url);
        //curl_setopt($session, CURLOPT_POST, 1); 
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
        $jsondata = curl_exec($session);
        curl_close($session);
        $jsondata = str_replace("\n", "", $jsondata);
        $jsondata = str_replace("\r", "", $jsondata);
//        print($jsondata);
        $obj = json_decode($jsondata, true);
     	$data['jsondata'] = $obj;
     	$this->load->view('header');
		$this->load->view('jsondata_view',$data);
		$this->load->view('footer');				

        
        //return $obj;
    }






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */