<?php

class Datalurah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataLurah by id
     */
    function get_DataLurah($id)
    {
        return $this->db->get_where('lurah', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataLurah
     */
    function get_all_DataLurah()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('lurah')->result_array();
        }

        return $this->db->get('lurah')->result_array();
    }

    /*
     * function to add new DataLurah
     */
    function add_DataLurah($params)
    {
        $this->db->insert('lurah',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataLurah
     */
    function update_DataLurah($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('lurah',$params);
    }

    /*
     * function to delete DataLurah
     */
    function delete_DataLurah($id)
    {
        return $this->db->delete('lurah',array('id'=>$id));
    }
}