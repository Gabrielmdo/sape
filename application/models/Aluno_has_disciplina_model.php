<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aluno_has_disciplina_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get aluno_has_disciplina by id
     */
    function get_aluno_has_disciplina($id)
    {
        return $this->db->get_where('aluno_has_disciplina',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all aluno_has_disciplina
     */
    function get_all_aluno_has_disciplina()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('aluno_has_disciplina')->result_array();
    }
        
    /*
     * function to add new aluno_has_disciplina
     */
    function add_aluno_has_disciplina($params)
    {
        $this->db->insert('aluno_has_disciplina',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update aluno_has_disciplina
     */
    function update_aluno_has_disciplina($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('aluno_has_disciplina',$params);
    }
    
    /*
     * function to delete aluno_has_disciplina
     */
    function delete_aluno_has_disciplina($id)
    {
        return $this->db->delete('aluno_has_disciplina',array('id'=>$id));
    }
}