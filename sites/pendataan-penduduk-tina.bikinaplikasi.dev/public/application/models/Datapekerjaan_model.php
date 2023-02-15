<?php

class Datapekerjaan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPekerjaan by id
     */
    function get_DataPekerjaan($id)
    {
        return $this->db->get_where('pekerjaan', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataPekerjaan
     */
    function get_all_DataPekerjaan()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('pekerjaan')->result_array();
        }

        return $this->db->get('pekerjaan')->result_array();
    }

    /*
     * function to add new DataPekerjaan
     */
    function add_DataPekerjaan($params)
    {
        $this->db->insert('pekerjaan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPekerjaan
     */
    function update_DataPekerjaan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pekerjaan',$params);
    }

    /*
     * function to delete DataPekerjaan
     */
    function delete_DataPekerjaan($id)
    {
        return $this->db->delete('pekerjaan',array('id'=>$id));
    }
}