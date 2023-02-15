<?php

class Datapenduduktetap_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukTetap by id
     */
    function get_DataPendudukTetap($id)
    {
        return $this->db->get_where('penduduktetap',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukTetap
     */
    function get_all_DataPendudukTetap()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {

            return $this->db->query("Select * from penduduk JOIN penduduktetap ON penduduktetap.nik = penduduk.nik
                where penduduktetap.nik like '%{$this->input->get('q')}%'
            ")->result_array();
        }

        return $this->db->query('Select * from penduduk JOIN penduduktetap ON penduduktetap.nik = penduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukTetap
     */
    function add_DataPendudukTetap($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('penduduktetap',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukTetap
     */
    function update_DataPendudukTetap($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('penduduktetap',$params);
    }

    /*
     * function to delete DataPendudukTetap
     */
    function delete_DataPendudukTetap($id)
    {
        return $this->db->delete('penduduktetap',array('nik'=>$id));
    }

    /*
    function get_DataPendudukTetap_menikah()
    {
        $data = $this->db->query("select * DataPendudukTetap where status='menikah'");
        return $data->result_array();
    }
    */
}