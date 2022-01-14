<?php
    // namespace Controller;

    require 'model/apiModel.php';
    class apiController {

        public function get(){
            $initModel = new apiModel;
            $callModel = $initModel->Select();
            echo $callModel;
        }
        

        public function getAppart() {
            echo "test";
        }
    }