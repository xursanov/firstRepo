<?php

$server_name = "localhost";
$username = "root";
try {
    $conn = new PDO("mysql:host=$server_name;dbname=children", $username );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected \n";
    
    A:
    echo "1  or 2 or 3 or 4 : \n";
    $value = readline();

  if ($value == '1'){
    $lastname = readline("Ism kiriting: \n");
    $surname = readline("Familiya kiriting: \n");
    $born = readline("Tug`ilgan sana kiriting: \n");
    $adress = readline("Yashash manzilini kiriting: \n");

    $sql = "INSERT INTO informatsiya (LastName, Surname, Born, Adress) Values ('$lastname', '$surname', '$born', '$adress')";
    $conn->exec($sql);
   goto A;
  }elseif($value == '2'){
    $lastname = readline("Ism kiriting: \n");
    $surname = readline("Familiya kiriting: \n");

    $sql = "SELECT * FROM informatsiya";
    $stmt =$conn->query($sql);
    $result = $stmt->fetchAll();
    
    $found = false;

    foreach ($result as $row){
        if ($row['LastName'] == $lastname && $row['Surname']== $surname){
            $found = true;
print_r($row);
            break;
        }
    } 
   goto A;

   if ($found){
       echo "user muvaffaqiyatli topildi! \n";
   }elseif(!$found){
       echo "user not found \n";
   }
}elseif($value== '3'){
    $id = readline("id kiriting: \n");
    $lastname = readline("Ism kiriting: \n");
    $surname = readline("Familiya kiriting: \n");
    $born = readline("Tug`ilgan sana kiriting: \n");
    $adress = readline("Yashash manzilini kiriting: \n");
    
    $sql = "UPDATE informatsiya SET
        Adress = '$adress',
        LastName = '$lastname',
        Surname = '$surname',
        Born = '$born'
        WHERE Id = '$id'";
    
    $stmt = $conn->exec($sql);
    
    if ($stmt) {
        echo "Record updated successfully! \n";
    } else {
        echo "Error updating record \n";
    }
    goto A;

}elseif($value == '4'){
    $id = readline("O`chirmoqchi bo`lgan id raqamini kiriting: \n");

    $sql = "DELETE  FROM informatsiya WHERE Id = '$id'";
     
    $stmt = $conn->exec($sql);
    
    if ($stmt) {
        echo "Record deleted successfully! \n";
    } else {
        echo "Error deleting record \n";
    }
    goto A;
}
}catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  ?>