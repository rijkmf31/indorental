<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Konsumen_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get konsumen by id_konsumen
     */
    function get_konsumen($id_konsumen)
    {
        return $this->db->get_where('konsumen',array('id_konsumen'=>$id_konsumen))->row_array();
    }
        
    /*
     * Get all konsumen
     */
    function get_all_konsumen()
    {
        $this->db->order_by('id_konsumen', 'desc');
        return $this->db->get('konsumen')->result_array();
    }
        
    /*
     * function to add new konsumen
     */

    function add_konsumen($data){
        $this->db->insert('konsumen',$data);
    }
    
   /*
     * function to update konsuman
     */
    function update_konsumen($id_konsumen,$params)
    {
        $this->db->where('id_konsumen',$id_konsumen);
        return $this->db->update('konsumen',$params);
    }
    
    /*
     * function to delete konsuman
     */
    function delete_konsumen($id_konsumen)
    {
        return $this->db->delete('konsumen',array('id_konsumen'=>$id_konsumen));
    }
}
