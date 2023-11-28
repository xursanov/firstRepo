<?php

require 'User.php';

class Reg{

    public $reg = [];
    
    public function create($username, $password){
        $regist = new User($username, $password);
        $this->reg [] = $regist;
    }

    public function search($lyuboy){
        foreach ($this->reg as $xoxish){
            if ($xoxish->username == $lyuboy){
                echo $xoxish->info();
                break;
            }else{
                echo "xatolik mavjud! \n";
            }
        }
    }

        public function getReg(){
            foreach ($this->reg as $zbor){
                $zbor->info();
            }
        }
}