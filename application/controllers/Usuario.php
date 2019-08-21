<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of usuario
     */
    function index()
    {
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Fazer login
     */
    function logar(){
                
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('senha','Senha','required');

        if($this->form_validation->run()){   
            $params = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha'),
            );
        
            $usuario = $this->Usuario_model->validar_usuario($params);
           
            if($usuario){
                $arraySession = array('id_usuario' => $usuario['id'], 'nome_usuario' => $usuario['nome'] );

                $this->load->library('session');
                $this->session->set_userdata($arraySession);
                redirect('/sape/Logado'); #Temporario
            }else{
                $data['mensagem'] = "Não foi possível fazer o Login!";
                $data['_view'] = 'usuario/Login/index';
                $this->load->view('usuario/login', $data);
            }    
        }else{  
                $data['mensagem'] = "Preencha ambos campos!";
                $data['_view'] = 'usuario/Login/index';           
                $this->load->view('usuario/login', $data);
        }
    }  


    function sair(){
        $this->load->library('session');
        $this->session->sess_destroy(); 
        redirect('/sape');


    }
    function selecao(){
        redirect('/sape/logado');
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','max_length[45]');
		$this->form_validation->set_rules('email','Email','required|max_length[45]|valid_email');
		$this->form_validation->set_rules('senha','Senha','required|max_length[45]');
		$this->form_validation->set_rules('funcao','Funcao','max_length[45]');
		$this->form_validation->set_rules('cpf','Cpf','max_length[45]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'funcao' => $this->input->post('funcao'),
				'cpf' => $this->input->post('cpf'),
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('/sape/usuario/index');
        }
        else
        {            
            $data['_view'] = 'usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($id)
    {   
        // check if the usuario exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        
        if(isset($data['usuario']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','max_length[45]');
			$this->form_validation->set_rules('email','Email','required|max_length[45]|valid_email');
			$this->form_validation->set_rules('senha','Senha','required|max_length[45]');
			$this->form_validation->set_rules('funcao','Funcao','max_length[45]');
			$this->form_validation->set_rules('cpf','Cpf','max_length[45]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nome' => $this->input->post('nome'),
					'email' => $this->input->post('email'),
					'senha' => $this->input->post('senha'),
					'funcao' => $this->input->post('funcao'),
					'cpf' => $this->input->post('cpf'),
                );

                $this->Usuario_model->update_usuario($id,$params);            
                redirect('/sape/usuario/selecao');
            }
            else
            {
                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting usuario
     */
    function remove($id)
    {
        $usuario = $this->Usuario_model->get_usuario($id);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['id']))
        {
            $this->Usuario_model->delete_usuario($id);
            redirect('/sape/usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}
