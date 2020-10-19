<?php
class Client {
    private $fromSite;
    private $name;
    private $phone;
    private $mail;
    private $message;

    public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function create(){
        $sql = new Database();    
        $sql->query("INSERT INTO clients (fromSite,name,phone,mail,message) VALUES (:FROMSITE,:NAME,:PHONE,:MAIL,:MESSAGE);", array(
            ":FROMSITE"=>$this->fromSite,
            ":NAME"=>$this->name,
            ":PHONE"=>$this->phone,
            ":MAIL"=>$this->mail,
            ":MESSAGE"=>$this->message
            )); 
    }

    public static function list(){       
        $sql = new Database();
        $query = "SELECT *FROM clients ORDER BY name ASC;";      
        return $sql->select($query);
    }

    public function __construct($name,$phone,$mail,$message,$fromSite=false){
        $this->fromSite = $fromSite;
        $this->name = $name;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->message = $message;
    }
}
?>