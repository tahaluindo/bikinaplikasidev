<?php

class Datapendudukdatang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukDatang by id
     */
    function get_DataPendudukDatang($id)
    {
        return $this->db->get_where('pendudukdatang',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukDatang
     */
    function get_all_DataPendudukDatang()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {
            return $this->db->query("Select * from Penduduk JOIN pendudukdatang ON pendudukdatang.nik = penduduk.nik
                where pendudukdatang.nik like '%{$this->input->get('q')}%'
            ")->result_array();
        }

        // return $this->db->query('Select * from DataPendudukDatang')->result_array();
        return $this->db->query('Select * from penduduk JOIN pendudukdatang ON pendudukdatang.nik = penduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukDatang
     */
    function add_DataPendudukDatang($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('pendudukdatang',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukDatang
     */
    function update_DataPendudukDatang($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('pendudukdatang',$params);
    }

    /*
     * function to delete DataPendudukDatang
     */
    function delete_DataPendudukDatang($id)
    {
        return $this->db->delete('pendudukdatang',array('nik'=>$id));
    }

    /*
    function get_DataPendudukDatang_menikah()
    {
        $data = $this->db->query("select * DataPendudukDatang where status='menikah'");
        return $data->result_array();
    }
    */
}