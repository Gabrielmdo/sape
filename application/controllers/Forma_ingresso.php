<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Forma_ingresso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Forma_ingresso_model');
    } 

    /*
     * Listing of forma_ingresso
     */
    function index()
    {
        $data['forma_ingresso'] = $this->Forma_ingresso_model->get_all_forma_ingresso();
        
        $data['_view'] = 'forma_ingresso/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new forma_ingresso
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'descricao' => $this->input->post('descricao'),
            );
            
            $forma_ingresso_id = $this->Forma_ingresso_model->add_forma_ingresso($params);
            redirect('forma_ingresso/index');
        }
        else
        {            
            $data['_view'] = 'forma_ingresso/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a forma_ingresso
     */
    function edit($id)
    {   
        // check if the forma_ingresso exists before trying to edit it
        $data['forma_ingresso'] = $this->Forma_ingresso_model->get_forma_ingresso($id);
        
        if(isset($data['forma_ingresso']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'descricao' => $this->input->post('descricao'),
                );

                $this->Forma_ingresso_model->update_forma_ingresso($id,$params);            
                redirect('forma_ingresso/index');
            }
            else
            {
                $data['_view'] = 'forma_ingresso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The forma_ingresso you are trying to edit does not exist.');
    } 

    /*
     * Deleting forma_ingresso
     */
    function remove($id)
    {
        $forma_ingresso = $this->Forma_ingresso_model->get_forma_ingresso($id);

        // check if the forma_ingresso exists before trying to delete it
        if(isset($forma_ingresso['id']))
        {
            $this->Forma_ingresso_model->delete_forma_ingresso($id);
            redirect('forma_ingresso/index');
        }
        else
            show_error('The forma_ingresso you are trying to delete does not exist.');
    }
    
}