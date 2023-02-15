<?php

class Datapendudukmeninggal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukMeninggal by id
     */
    function get_DataPendudukMeninggal($id)
    {
        return $this->db->get_where('datapendudukmeninggal',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukMeninggal
     */
    function get_all_DataPendudukMeninggal()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {
            return $this->db->query("Select * from datapenduduk JOIN datapendudukmeninggal ON datapendudukmeninggal.nik = datapenduduk.nik
                where datapendudukmeninggal.nik like '%{$this->input->get('q')}%'
            ")->result_array();
        }

        return $this->db->query('Select * from datapenduduk JOIN datapendudukmeninggal ON datapendudukmeninggal.nik = datapenduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukMeninggal
     */
    function add_DataPendudukMeninggal($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('datapendudukmeninggal', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukMeninggal
     */
    function update_DataPendudukMeninggal($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('datapendudukmeninggal',$params);
    }

    /*
     * function to delete DataPendudukMeninggal
     */
    function delete_DataPendudukMeninggal($id)
    {
        return $this->db->delete('datapendudukmeninggal',array('nik'=>$id));
    }

    /*
    function get_DataPendudukMeninggal_menikah()
    {
        $data = $this->db->query("select * DataPendudukMeninggal where status='menikah'");
        return $data->result_array();
    }
    */
}