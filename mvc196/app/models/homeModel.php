<?php

class homeModel extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function updateHome($table, $data, $conditon)
    {
        return $this->db->update($table, $data, $conditon);
    }
    public function selectHomeAll($table)
    {
        $sql = "SELECT * FROM $table WHERE $table.`status`= 1 ";
        return $this->db->select($sql);
    }
    public function selectHomeWithConditon($table, $conditon)
    {
        $sql = "SELECT * FROM $table WHERE $conditon";
        return $this->db->select($sql);
    }

    public function SelectOrder($table, $sort, $limit = 15, $offset = 0)
    {
        $sql = "SELECT * FROM $table WHERE $table.`status`= 1 ORDER BY $sort DESC LIMIT $offset,$limit ";
        return $this->db->select($sql);
    }
    public function selectProductByBrand($table, $table2, $limit)
    {
        $sql = "SELECT * FROM `$table` INNER JOIN `$table2` ON `$table`.`brand_id` = `$table2`.`id` WHERE $table2.`status`= 1 ORDER BY `$table`.`id` DESC LIMIT $limit";
        return $this->db->select($sql);
    }
    public function CountRow($table)
    {
        $sql = "SELECT * FROM $table  WHERE $table.`status`= 1";
        return $this->db->getNumbersRow($sql);
    }
}
