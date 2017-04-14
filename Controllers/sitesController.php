<?php


class Ville
{
    private $_ville;
    private $_site;
    private $_periode;
    private $_dateDebut;
    private $_dateFin;

    public function ville()
    {
        return $this -> _ville;
    }
    public function site()
    {
        return $this -> _site;
    }
    public function periode()
    {
        return $this -> _periode;
    }
    public function dateDebut()
    {
        return $this -> _dateDebut;
    }
    public function dateFin()
    {
        return $this -> _dateFin;
    }

    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

    public function setSite($site)
    {
        $this->_site = $site;
    }

    public function setPeriode($periode)
    {
        $this->_periode = $periode;
    }

    public function setDateDebut($dateDebut)
    {
        $this->_dateDebut = $dateDebut;
    }

    public function setDateFin($dateFin)
    {
        $this->_dateFin = $dateFin;
    }
}

class Departement extends Ville
{
    private $_departement;

    public function departement()
    {
        return $this -> _departement;
    }

    public function setDepartement($departement)
    {
        $this->_departement = $departement;
    }
}


?>