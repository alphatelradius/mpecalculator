<?php

class Modeldb extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($table, $start_limit = '', $end_limit = '') {

        if (($end_limit != '' ) || ( $start_limit != '')) {
            $take = $this->db->query("select * from $table limit $start_limit, $end_limit");
        } else {
            $take = $this->db->query("select * from $table");
        }
        return $take->result();
    }

    function count($table, $param = '') {
        $this->db->select('*');
        $this->db->from($table);
        if ($param != '') {
            $this->db->where($param);
        }
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    function get_by($param, $table, $start_limit = '', $end_limit = '', $order = 'id', $sort = 'asc') {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($param);
        if (($end_limit != '' ) || ( $start_limit != '')) {
            $this->db->limit($end_limit, $start_limit);
        }
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result();
    }

    function get_join($select, $param = '', $table, $start_limit = '', $end_limit = '', $order = 'id', $sort = 'asc', $joiner = '') {
        $this->db->select($select);
        $this->db->from($table);
        if ($param != '') {
            $this->db->where($param);
        }
        if (($end_limit != '' ) || ( $start_limit != '')) {
            $this->db->limit($end_limit, $start_limit);
        }
        if ($joiner != '') {
            foreach ($joiner as $key => $val) {
                $this->db->join($key, $val);
            }
        }
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        return $query->result();
    }

    function insert($data, $table) {
        $this->db->insert($table, $data);
        $this->db->select_max('id');
	$Q = $this->db->get($table);
	$row = $Q->row_array();
	return $row['id'];
    }

    function update($id, $data, $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function delete($id, $table) {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function delete_where($param, $table) {
        $this->db->where($param);
        $this->db->delete($table);
    }
    function query($query) {
        $take = $this->db->query($query);
        return $take->result();
    }

}
