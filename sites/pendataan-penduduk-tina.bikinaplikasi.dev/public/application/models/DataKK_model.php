<?php

class DataKK_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataKK by id
     */
    function get_DataKK($id)
    {
        return $this->db->get_where('kk', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataKK
     */
    function get_all_DataKK()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('nik', "{$this->input->get('q')}")->get('kk')->result_array();
        }

        return $this->db->get('kk')->result_array();
    }

    /*
     * function to add new DataKK
     */
    function add_DataKK($params)
    {
        $this->db->insert('kk',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataKK
     */
    function update_DataKK($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('kk',$params);
    }

    /*
     * function to delete DataKK
     */
    function delete_DataKK($id)
    {
        return $this->db->delete('kk',array('id'=>$id));
    }
}