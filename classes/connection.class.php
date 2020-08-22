<?php

class conect {
    protected $user = 'root';
    protected $host = 'localhost';
    protected $password = '';
    protected $database = 'c3ibasededados';
    protected $link;

    //conectar ao mysql
     function __construct() {
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->database);
        return $this->link;
    }   
    function action($query){
      
        $result = mysqli_query($this->link, $query);
        return $result;
    }
   public function real_escape_string($string) {
    // todo: make sure your connection is active etc.
    return $this->link->real_escape_string($string);
  }

}
