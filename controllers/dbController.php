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

    public function getPressureByID()
    {
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
}
