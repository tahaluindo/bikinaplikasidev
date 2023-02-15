<?php

class datauser_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by id
     */
    function get_DataUser($id)
    {
        return $this->db->get_where('user',array('username'=>$id))->row_array();
    }

    /*
     * Get all user
     */
    function get_all_DataUser()
    {
        $this->db->order_by('username', 'desc');

        if($this->input->get('q')) {
            return $this->db->like('nama_lengkap', "{$this->input->get('q')}")->get('user')->result_array();
        }

        return $this->db->get('user')->result_array();
    }

    /*
     * function to add new user
     */
    function add_user($params)
    {
        // echo "<pre>";
        // print_r($params); die();
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */
    function update_DataUser($id,$params)
    {
        $this->db->where('username',$id);
        
        return $this->db->update('user',$params);
    }

    /*
     * function to delete user
     */
    function delete_user($id)
    {
        return $this->db->delete('user',array('username'=>$id));
    }

    /*
    function get_user_meidah()
    {
        $data = $this->db->query("select * user where status='meidah'");
        return $data->result_array();
    }
    */
}