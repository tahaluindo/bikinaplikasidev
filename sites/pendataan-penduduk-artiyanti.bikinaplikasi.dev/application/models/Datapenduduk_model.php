<?php

class Datapenduduk_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPenduduk by id
     */
    function get_DataPenduduk($id)
    {
        return $this->db->get_where('datapenduduk',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPenduduk
     */
    function get_all_DataPenduduk()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {
            $dataPenduduk = $this->db->like('nama_lengkap', "{$this->input->get('q')}")->get('datapenduduk')->result_array();
            
            return $dataPenduduk;
        }

        $dataPenduduk = $this->db->get('datapenduduk')->result_array();

        return $dataPenduduk;
    }

    /*
     * function to add new DataPenduduk
     */
    function add_DataPenduduk($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('datapenduduk',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPenduduk
     */
    function update_DataPenduduk($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('datapenduduk',$params);
    }

    /*
     * function to delete DataPenduduk
     */
    function delete_DataPenduduk($id)
    {
        return $this->db->delete('datapenduduk',array('nik'=>$id));
    }

    /*
    function get_DataPenduduk_menikah()
    {
        $data = $this->db->query("select * DataPenduduk where status='menikah'");
        return $data->result_array();
    }
    */
}