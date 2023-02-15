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
        return $this->db->get_where('penduduk',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPenduduk
     */
    function get_all_DataPenduduk()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('jenis_kelamin')) {

            $this->db->where('jenis_kelamin', $this->input->get('jenis_kelamin'));
        }

        if($this->input->get('q')) {
            $dataPenduduk = $this->db->like('nama_lengkap', "{$this->input->get('q')}")->get('penduduk')->result_array();
            
            return $dataPenduduk;
        }

        $dataPenduduk = $this->db->get('penduduk')->result_array();

        return $dataPenduduk;
    }

    /*
     * function to add new DataPenduduk
     */
    function add_DataPenduduk($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('penduduk',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPenduduk
     */
    function update_DataPenduduk($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('penduduk',$params);
    }

    /*
     * function to delete DataPenduduk
     */
    function delete_DataPenduduk($id)
    {
        return $this->db->delete('penduduk',array('nik'=>$id));
    }

    /*
    function get_DataPenduduk_menikah()
    {
        $data = $this->db->query("select * DataPenduduk where status='menikah'");
        return $data->result_array();
    }
    */
}