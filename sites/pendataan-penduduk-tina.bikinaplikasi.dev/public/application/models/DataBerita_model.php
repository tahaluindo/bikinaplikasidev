<?php

class DataBerita_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataBerita by id
     */
    function get_DataBerita($id)
    {
        return $this->db->get_where('berita', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataBerita
     */
    function get_all_DataBerita()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('berita')->result_array();
        }

        return $this->db->get('berita')->result_array();
    }

    /*
     * function to add new DataBerita
     */
    function add_DataBerita($params)
    {
        $this->db->insert('berita',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataBerita
     */
    function update_DataBerita($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('berita',$params);
    }

    /*
     * function to delete DataBerita
     */
    function delete_DataBerita($id)
    {
        return $this->db->delete('berita',array('id'=>$id));
    }
}