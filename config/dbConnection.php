<?php
class DBConnection
{
    public $connection;

    private $host = "localhost"; ## localhost:3306
    private $username = "root";
    private $password = "";
    private $dbname = "realtime_chat";

    public function __construct()
    {
        try {
            $con = mysqli_connect($this->host, $this->username, $this->password, $this->dbname); ## สร้าง connection

            if ($con) {
                mysqli_query($con, "SET NAMES UTF8") or die(mysqli_error($con)); ## กำหนดชุดตัวอักษร
                date_default_timezone_set("Asia/Bangkok"); ## กำหนดโซนเวลา
                $this->connection = $con; ## กำหนดค่าให้ connection
            } else {
                $this->connection = false; 
                exit;
            }
        } catch (Exception $e) {
            $this->connection = false; 
            exit;
        }
    }
}
