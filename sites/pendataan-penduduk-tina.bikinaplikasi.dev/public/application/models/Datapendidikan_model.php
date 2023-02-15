<?php

class Datapendidikan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendidikan by id
     */
    function get_DataPendidikan($id)
    {
        return $this->db->get_where('pekerjaan', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataPendidikan
     */
    function get_all_DataPendidikan()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('pekerjaan')->result_array();
        }

        return $this->db->get('pekerjaan')->result_array();
    }

    /*
     * function to add new DataPendidikan
     */
    function add_DataPendidikan($params)
    {
        $this->db->insert('pekerjaan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendidikan
     */
    function update_DataPendidikan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pekerjaan',$params);
    }

    /*
     * function to delete DataPendidikan
     */
    function delete_DataPendidikan($id)
    {
        return $this->db->delete('pekerjaan',array('id'=>$id));
    }
}