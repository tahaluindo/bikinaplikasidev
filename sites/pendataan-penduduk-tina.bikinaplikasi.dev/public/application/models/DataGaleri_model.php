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
        return $this->db->get_where('galeri', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataGaleri
     */
    function get_all_DataGaleri()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('galeri')->result_array();
        }

        return $this->db->get('galeri')->result_array();
    }

    /*
     * function to add new DataGaleri
     */
    function add_DataGaleri($params)
    {
        $this->db->insert('galeri',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataGaleri
     */
    function update_DataGaleri($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('galeri',$params);
    }

    /*
     * function to delete DataGaleri
     */
    function delete_DataGaleri($id)
    {
        return $this->db->delete('galeri',array('id'=>$id));
    }
}