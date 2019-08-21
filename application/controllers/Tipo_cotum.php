<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_cotum extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_cotum_model');
    } 

    /*
     * Listing of tipo_cota
     */
    function index()
    {
        $data['tipo_cota'] = $this->Tipo_cotum_model->get_all_tipo_cota();
        
        $data['_view'] = 'tipo_cotum/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tipo_cotum
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'descricao' => $this->input->post('descricao'),
            );
            
            $tipo_cotum_id = $this->Tipo_cotum_model->add_tipo_cotum($params);
            redirect('tipo_cotum/index');
        }
        else
        {            
            $data['_view'] = 'tipo_cotum/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tipo_cotum
     */
    function edit($id)
    {   
        // check if the tipo_cotum exists before trying to edit it
        $data['tipo_cotum'] = $this->Tipo_cotum_model->get_tipo_cotum($id);
        
        if(isset($data['tipo_cotum']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'descricao' => $this->input->post('descricao'),
                );

                $this->Tipo_cotum_model->update_tipo_cotum($id,$params);            
                redirect('tipo_cotum/index');
            }
            else
            {
                $data['_view'] = 'tipo_cotum/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipo_cotum you are trying to edit does not exist.');
    } 

    /*
     * Deleting tipo_cotum
     */
    function remove($id)
    {
        $tipo_cotum = $this->Tipo_cotum_model->get_tipo_cotum($id);

        // check if the tipo_cotum exists before trying to delete it
        if(isset($tipo_cotum['id']))
        {
            $this->Tipo_cotum_model->delete_tipo_cotum($id);
            redirect('tipo_cotum/index');
        }
        else
            show_error('The tipo_cotum you are trying to delete does not exist.');
    }
    
}
