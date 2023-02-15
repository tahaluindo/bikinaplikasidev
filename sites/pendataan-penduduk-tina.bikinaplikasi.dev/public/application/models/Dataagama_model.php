<?php

class Dataagama_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataAgama by id
     */
    function get_DataAgama($id)
    {
        return $this->db->get_where('agama', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataAgama
     */
    function get_all_DataAgama()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('agama')->result_array();
        }

        return $this->db->get('agama')->result_array();
    }

    /*
     * function to add new DataAgama
     */
    function add_DataAgama($params)
    {
        $this->db->insert('agama',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataAgama
     */
    function update_DataAgama($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('agama',$params);
    }

    /*
     * function to delete DataAgama
     */
    function delete_DataAgama($id)
    {
        return $this->db->delete('agama',array('id'=>$id));
    }
}