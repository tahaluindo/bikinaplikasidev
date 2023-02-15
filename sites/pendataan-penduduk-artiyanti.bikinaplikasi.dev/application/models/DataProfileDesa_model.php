<?php

class DataProfileDesa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataProfileDesa by id
     */
    function get_DataProfileDesa($id)
    {
        return $this->db->get_where('dataprofiledesa', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataProfileDesa
     */
    function get_all_DataProfileDesa()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('dataprofiledesa')->result_array();
        }

        return $this->db->get('dataprofiledesa')->result_array();
    }

    /*
     * function to add new DataProfileDesa
     */
    function add_DataProfileDesa($params)
    {
        $this->db->insert('dataprofiledesa',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataProfileDesa
     */
    function update_DataProfileDesa($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('dataprofiledesa',$params);
    }

    /*
     * function to delete DataProfileDesa
     */
    function delete_DataProfileDesa($id)
    {
        return $this->db->delete('dataprofiledesa',array('id'=>$id));
    }
}