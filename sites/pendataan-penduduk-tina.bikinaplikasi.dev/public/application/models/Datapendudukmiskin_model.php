<?php

class Datapendudukmiskin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukMiskin by id
     */
    function get_DataPendudukMiskin($id)
    {
        return $this->db->get_where('pendudukmiskin',array('nik'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukMiskin
     */
    function get_all_DataPendudukMiskin()
    {
        $this->db->order_by('nik', 'desc');

        if($this->input->get('q')) {
            return $this->db->query("Select * from penduduk JOIN pendudukmiskin ON pendudukmiskin.nik = penduduk.nik
                where pendudukmiskin.nik like '%{$this->input->get('q')}%'
            ")->result_array();
        }

        return $this->db->query('Select * from penduduk JOIN pendudukmiskin ON pendudukmiskin.nik = penduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukMiskin
     */
    function add_DataPendudukMiskin($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('pendudukmiskin', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukMiskin
     */
    function update_DataPendudukMiskin($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('pendudukmiskin',$params);
    }

    /*
     * function to delete DataPendudukMiskin
     */
    function delete_DataPendudukMiskin($id)
    {
        return $this->db->delete('pendudukmiskin',array('nik'=>$id));
    }

    /*
    function get_DataPendudukMiskin_menikah()
    {
        $data = $this->db->query("select * DataPendudukMiskin where status='menikah'");
        return $data->result_array();
    }
    */
}