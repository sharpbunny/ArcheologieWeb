<?php
include'Connector.php';
class Map{

  private $latitude;
  private $longitude;

  function __contruct($latitude,$longitude)
  {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
  }

    public function getLatitude()
    {
    return $this->latitude;        
    }
    public function getLongitude()
    {
    return $this->longitude;        
    }

    public function setLatitude($value)
    {   
            $this->latitude=$value;
    }
        
    public function setLongitude($value)
    {  
            $this->longitude=$value;
    }

    public function afficherCarte(){
            
    }
}