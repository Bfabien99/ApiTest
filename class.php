<?php
class Vehicule{

        public $vitesse = 0;
        public static $roue = 0;

        public function __construct($vitesse = 0) {
            $this->vitesse = $vitesse;
        }

        public function rouler(){
            $this->vitesse++;
        }

        public static function changerRoue() {
            self::$roue = 10;
        }
    }

    class Voiture extends Vehicule{

        public function __construct()
        {
            $this->rouler();
        }
        public function showVitesse() {
            echo $this->vitesse;
        }
    }

    class Moto {
        public $v;
        public function __construct(){
            $this->v = new Vehicule(5);
            $this->v->rouler();
        }
        public function showVitesse() {
            echo $this->v->vitesse;
        }
    }

    $honda  = new Voiture();
    echo Vehicule::changerRoue();
    $lambo = new Vehicule();
    echo $lambo::$roue;
    $honda->showVitesse();
    $bmw = new Moto();
    $bmw->showVitesse();
