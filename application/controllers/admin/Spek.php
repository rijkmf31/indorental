<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Spek extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Spek_m');
    } 

    /*
     * Listing of spek
     */
    function index()
    {
        $data['spek'] = $this->Spek_m->get_all_spek();
        $data['_view'] = 'admin/spek/index';
         $this->load->model('Kategori_m');
      $data['all_kategori'] = $this->Kategori_m->get_all_kategori();
        $this->template->load('admin/adminTemplate','admin/spek/index',$data);
    }

    /*
     * Adding a new spek
     */
    function add()
    {   
        $this->load->library('form_validation');

    $this->form_validation->set_rules('id_kategori','Id Kategori','required|integer');
    $this->form_validation->set_rules('spek','Spek','required|max_length[25]');
    
    if($this->form_validation->run())     
        {   
            $params = array(
        'id_kategori' => $this->input->post('id_kategori'),
        'spek' => $this->input->post('spek'),
            );
            
            $spek_id = $this->Spek_m->add_spek($params);
            redirect('admin/spek/index');
        }
        else
        {
      $this->load->model('Kategori_m');
      $data['all_kategori'] = $this->Kategori_m->get_all_kategori();
            
            $data['_view'] = 'admin/spek/add';
            $this->template->load('admin/adminTemplate','admin/spek/index',$data);
        }
    }  

    /*
     * Editing a spek
     */
    function edit($id_spek)
    {   
        // check if the spek exists before trying to edit it
        $data['spek'] = $this->Spek_m->get_spek($id_spek);
        
        if(isset($data['spek']['id_spek']))
        {
            $this->load->library('form_validation');

      $this->form_validation->set_rules('id_kategori','Id Kategori','required|integer');
      $this->form_validation->set_rules('spek','Spek','required|max_length[25]');
    
      if($this->form_validation->run())     
            {   
                $params = array(
          'id_kategori' => $this->input->post('id_kategori'),
          'spek' => $this->input->post('spek'),
                );

                $this->Spek_m->update_spek($id_spek,$params);            
                redirect('admin/spek/index');
            }
            else
            {
        $this->load->model('Kategori_m');
        $data['all_kategori'] = $this->Kategori_m->get_all_kategori();

                $data['_view'] = 'admin/spek/edit';
               $this->template->load('admin/adminTemplate','admin/spek/edit',$data);
            }
        }
        else
            show_error('The spek you are trying to edit does not exist.');
    } 

    /*
     * Deleting spek
     */
    function remove($id_spek)
    {
        $spek = $this->Spek_m->get_spek($id_spek);

        // check if the spek exists before trying to delete it
        if(isset($spek['id_spek']))
        {
            $this->Spek_m->delete_spek($id_spek);
            redirect('admin/spek/index');
        }
        else
            show_error('The spek you are trying to delete does not exist.');
    }
    
}
