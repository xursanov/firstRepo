<?php

require "Reg.php";

$cell = new Reg();

A:

$value = readline("\n Registratsiyadan o`tmoqchi bo`lsangiz 1 ni bosing:
Foydalanuvchi qidirmoqchi bo`lsangiz 2 ni bosing: \n");

if ($value == "1"){
    $username = readline("ism kiriting: \n");
    $password = readline("parol kiriting: \n");
    echo $cell->create($username, $password);

    goto A;

}elseif($value == "2"){
    $username = readline("Ism kiriting: \n");
    echo $cell->search($password);

    goto A;

}else{
    echo "Ma`lumotda xatolik mavjud! \n";
}

goto A;