<?php

class DataGaleri_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataGaleri by id
     */
    function get_DataGaleri($id)
    {
        return $this->db->get_where('datagaleri', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataGaleri
     */
    function get_all_DataGaleri()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('datagaleri')->result_array();
        }

        return $this->db->get('datagaleri')->result_array();
    }

    /*
     * function to add new DataGaleri
     */
    function add_DataGaleri($params)
    {
        $this->db->insert('datagaleri',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataGaleri
     */
    function update_DataGaleri($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('datagaleri',$params);
    }

    /*
     * function to delete DataGaleri
     */
    function delete_DataGaleri($id)
    {
        return $this->db->delete('datagaleri',array('id'=>$id));
    }
}