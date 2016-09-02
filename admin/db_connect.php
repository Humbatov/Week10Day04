<?php
  class DB{
    public $host;
    public $user;
    public $pwd;
    public $db_name;
    public $db_con;

    public function __construct($host,$user,$pwd,$db_name){
      $this->host = $host;
      $this->user = $user;
      $this->pwd = $pwd;
      $this->db_name = $db_name;


    }

    public function db_con(){
      $this->db_con = mysqli_connect($this->host,$this->user,$this->pwd,$this->db_name);
      // if ($this->db_con) {
      //   echo "Succesfull connected";
      // }else {
      //   echo "Error";
      // }
    }

    public function show ($table, $where = "", $id = "", $how = '*'){
      if ($this->db_con) {
        $sql = "SELECT $how FROM $table $where  $id ";
        $query = mysqli_query($this->db_con,$sql);
        return $query;
      }
    }

    public function insert ($table,$column,$value){
      if ($this->db_con) {
        $sql = "INSERT INTO $table ( $column ) VALUES ($value)";
        $query = mysqli_query($this->db_con,$sql);
        return $sql;
      }
    }

    public function delete ($table, $id){
      if ($this->db_con) {
        $sql = "DELETE FROM $table WHERE id='$id'";
        $query = mysqli_query($this->db_con,$sql);
        return $query;
      }
    }

    public function sort ($table, $column = "", $keyword = "", $limit = "", $how = "*"){
      if ($this->db_con) {
        $sql = "SELECT $how FROM $table ORDER BY $column  $keyword $limit";
        $query = mysqli_query($this->db_con,$sql);
        return $query;
      }
    }

    public function update ($table, $col_val = "", $keyword = ""){
      if ($this->db_con) {
        $sql = "UPDATE $table SET $col_val WHERE  $keyword";
        $query = mysqli_query($this->db_con,$sql);
        return $query;
      }
    }
  }


  function first_sent($text){
    $pos = stripos($text, ".");
    $sentence = substr($text, 0, $pos);
    return $sentence;
  }




 ?>
