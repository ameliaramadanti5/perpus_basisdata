<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhereLessThan($tabel, $nilai)
    {
        $this->db->where('stok <', $nilai);
        $query = $this->db->get($tabel);

        return $query->result();
    }
    function DataCariBuku($cari)
    {
        $query = $this->db->query("Select * From tbl_buku where nama_buku like '%$cari%' ");
        return $query;
    }
	function DataCariPenerbit($cari)
	{
        $query = $this->db->query("Select * From tbl_penerbit where nama like '%$cari%' ");
        return $query;
	}
}

