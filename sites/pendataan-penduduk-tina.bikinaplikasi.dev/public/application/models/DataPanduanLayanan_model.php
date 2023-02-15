<?php

class DataPanduanLayanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPanduanLayanan by id
     */
    function get_DataPanduanLayanan($id)
    {
        return $this->db->get_where('panduanlayanan', array('id'=>$id))->row_array();
    }

    /*
     * Get all DataPanduanLayanan
     */
    function get_all_DataPanduanLayanan()
    {
        $this->db->order_by('id', 'desc');

        if( $this->input->get('q') ) {
            return $this->db->like('keterangan', "{$this->input->get('q')}")->get('panduanlayanan')->result_array();
        }

        return $this->db->get('panduanlayanan')->result_array();
    }

    /*
     * function to add new DataPanduanLayanan
     */
    function add_DataPanduanLayanan($params)
    {
        $this->db->insert('panduanlayanan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPanduanLayanan
     */
    function update_DataPanduanLayanan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('panduanlayanan',$params);
    }

    /*
     * function to delete DataPanduanLayanan
     */
    function delete_DataPanduanLayanan($id)
    {
        return $this->db->delete('panduanlayanan',array('id'=>$id));
    }
}