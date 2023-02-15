<?php

class Datart_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataRt by id
     */
    function get_DataRt($id)
    {
        return $this->db->get_where('rt', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataRt
     */
    function get_all_DataRt()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('nama_rt', "{$this->input->get('q')}")->get('rt')->result_array();
        }

        return $this->db->get('rt')->result_array();
    }

    /*
     * function to add new DataRt
     */
    function add_DataRt($params)
    {
        $this->db->insert('rt',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataRt
     */
    function update_DataRt($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('rt',$params);
    }

    /*
     * function to delete DataRt
     */
    function delete_DataRt($id)
    {
        return $this->db->delete('rt',array('id'=>$id));
    }
}