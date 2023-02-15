<?php

class datapenduduklahir_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get DataPendudukLahir by id
     */
    function get_DataPendudukLahir($id)
    {
        return $this->db->get_where('penduduklahir',array('id'=>$id))->row_array();
    }

    /*
     * Get all DataPendudukLahir
     */
    function get_all_DataPendudukLahir()
    {
        $this->db->order_by('id', 'desc');

        if($this->input->get('q')) {
            return $this->db->query("Select * from penduduklahir where penduduklahir.nama_lengkap like '%{$this->input->get('q')}%'
            ")->result_array();
            // return $this->db->query("Select * from DataPenduduk JOIN DataPendudukLahir ON DataPendudukLahir.nik = DataPenduduk.nik
            //     where DataPendudukLahir.nik like '%{$this->input->get('q')}%'
            // ")->result_array();
        }

        return $this->db->query('Select * from penduduklahir')->result_array();
        // return $this->db->query('Select * from DataPenduduk JOIN DataPendudukLahir ON DataPendudukLahir.nik = DataPenduduk.nik')->result_array();
    }

    /*
     * function to add new DataPendudukLahir
     */
    function add_DataPendudukLahir($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('penduduklahir',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update DataPendudukLahir
     */
    function update_DataPendudukLahir($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('penduduklahir',$params);
    }

    /*
     * function to delete DataPendudukLahir
     */
    function delete_DataPendudukLahir($id)
    {
        return $this->db->delete('penduduklahir',array('id'=>$id));
    }

    /*
    function get_DataPendudukLahir_menikah()
    {
        $data = $this->db->query("select * DataPendudukLahir where status='menikah'");
        return $data->result_array();
    }
    */
}