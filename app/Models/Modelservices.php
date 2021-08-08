<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

// if (!defined("BASEPATH")) exit("Tidak dapat mengakses langsung");
class Modelservices extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function instalasiGetAll()
    {
        $query = "SELECT * FROM m_instalasi";
        return $this->db->query($query)->getResultArray();
    }
    function unitGetInstalasi_id($params)
    {
        $query = "SELECT * FROM m_unit_layanan where IDINSTALASI=?";
        return $this->db->query($query, $params)->getResultArray();
    }
    function ruanganGetUnit_id($params)
    {
        $query = "SELECT * FROM m_ruangan where IDUNITLAYANAN=?";
        return $this->db->query($query, $params)->getResultArray();
    }
}
