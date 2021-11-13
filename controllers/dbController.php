<?php

// require($_SERVER['DOCUMENT_ROOT']. "/controllers/db_config.php");



class dbController
{

    private $dbconf;
    private $dbconn;

    function __construct($dbconf)
    {
        $this->dbconn = pg_connect("host={$dbconf['dbhost']} dbname={$dbconf['dbname']} user={$dbconf['dbuser']} password={$dbconf['dbpass']}");
    }

    public function getAllPressure()
    {
        // $dbconf = $this->dbconf;
        $dbconn = $this->dbconn;
        $query = "SELECT * FROM pressure";
        $res = pg_query($dbconn, $query);
        $row = pg_fetch_all($res);

        return $row;
    }

    public function getPressureByID($id)
    {
        $query = "SELECT * FROM pressure where id={$id}";
        $res = pg_query($this->dbconn, $query);
        $row = pg_fetch_row($res);

        return $row;
    }

    public function createPressure($array)
    {
        // $dbconn = $this-;
        $data = $this->sanitazeData($array);
        $insert = pg_insert($this->dbconn, 'pressure', $data);
        $insert = $data;
        return $insert;
    }

    public function deletePressure($id)
    {
        $getPressure = $this->getPressureByID($id);
        if (empty($getPressure)) {
            return "Не верный ID";
        } else {
            $where = array("id" => $id);
            // $query = "delete from pressure where id = 62";
            // $result = pg_query($this->dbconn,$query);

            $result = pg_delete($this->dbconn, 'pressure', $where);

            if (!$result) {
                return pg_last_error($this->dbconn);
            } else {
                return "Запись №{$id} удалена";
            }
        }
    }

    private function sanitazeData($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (empty($value)) {
                return 'Error';
            }
            $result[$key] = trim(strip_tags($value));
        }

        return $result;
    }
##########
    public function addCol(){
        $query = "ALTER TABLE pressure ADD COLUMN time VARCHAR"; 
        $add = pg_query($this->dbconn, $query);
        $row = pg_fetch_all($add);

        return $row;
    }

}
