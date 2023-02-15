<?php

class Datapendudukpindah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukPindah by id
     */
    function get_DataPendudukPindah($id)
    {
        return $this->db->get_where('pendudukpindah',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukPindah
     */
    function get_all_DataPendudukPindah()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {
            return $this->db->query("Select * from penduduk JOIN pendudukpindah ON pendudukpindah.nik = penduduk.nik
                where pendudukpindah.nik like '%{$this->input->get('q')}%'
            ")->result_array();
        }

        return $this->db->query('Select * from penduduk JOIN pendudukpindah ON pendudukpindah.nik = penduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukPindah
     */
    function add_DataPendudukPindah($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('pendudukpindah',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukPindah
     */
    function update_DataPendudukPindah($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('pendudukpindah',$params);
    }

    /*
     * function to delete DataPendudukPindah
     */
    function delete_DataPendudukPindah($id)
    {
        return $this->db->delete('pendudukpindah',array('nik'=>$id));
    }

    /*
    function get_DataPendudukPindah_menikah()
    {
        $data = $this->db->query("select * DataPendudukPindah where status='menikah'");
        return $data->result_array();
    }
    */
}