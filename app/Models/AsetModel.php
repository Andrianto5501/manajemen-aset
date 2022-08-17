<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nomor', 'sub_nomor', 'satuan', 'kode_barang', 'no_aset', 'tercatat', 'kode_lokasi', 'kode_perkap', 'kondisi_aset', 'uraian_aset', 'uraian_perkap', 'kode_ruang', 'kode_gedung', 'kondisi', 'catatan', 'nominal_aset', 'foto', 'tanggal_pengadaan', 'sumber_pengadaan', 'qr_code', 'user_penginput', 'created_at', 'deleted_at'];

    protected $useTimestamps = true;
    // protected $dateFormat           = 'datetime';
    // protected $createdField         = 'created_at';
    // protected $updatedField         = 'updated_at';
    // protected $deletedField         = 'deleted_at';

    public function getByKB($kode_barang)
    {
        return $this->builder()->where('kode_barang', $kode_barang)
            ->get()->getRowArray();
    }

    public function getByKBNA($kode_barang, $no_aset)
    {
        return $this->builder()->where('kode_barang', $kode_barang)
            ->where('no_aset', $no_aset)
            // ->getCompiledSelect();
            ->get()->getRowArray();
    }

    public function getHistory($id)
    {
        return $this->builder("barang_history")->where("barangId", $id)->get()->getResultArray();
    }

    function _multi_duplicate_insert($values)
    {
        $updatestr = array();
        $keystr    = array();
        $valstr    = null;
        $entries   = array();

        $temp = array_keys($values);
        $first = $values[$temp[0]];

        foreach ($first as $key => $val) {
            if($key != $this->primaryKey) {
                $updatestr[] = "`". $key . '` = VALUES(`' . $key . '`)';
            }
            $keystr[]    = $key;
        }

        foreach ($values as $entry) {
            $valstr = array();
            foreach ($entry as $key => $val) {
                $valstr[] = !empty($val) || $val == 0 ? "'". str_replace("'", "\'", $val) . "'" : "NULL";
            }
            $entries[] = "(" . implode(", ", $valstr) . ")";
        }

        $sql  = "INSERT INTO " . $this->table . " (`" . implode('`, `', $keystr) . "`) ";

        $sql .= "VALUES " . implode(', ', $entries);
        $sql .= "ON DUPLICATE KEY UPDATE " . implode(', ', $updatestr);

        // return $sql;
        return $this->db->query($sql);
    }

    public function ubah($id, $data) {
        return $this->builder()->set($data)->where($this->primaryKey, $id)->update();
    }
}
