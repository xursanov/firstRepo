<?php
$server_name = "localhost";
$username = "root";

try {
  $conn = new PDO("mysql:host=$server_name;dbname=kontakt", $username );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully \n";
  A:
  echo "Enter '1' for registration or '2' for login: \n";
  $action = readline();

  if ($action == '1') {

    echo "Enter name: \n";
    $name = readline();

    echo "Enter surname: \n";
    $surname = readline();

    echo "Enter city: \n";
    $city = readline();

    $sql = "INSERT INTO info (name, surname, city) VALUES ('$name', '$surname', '$city')";
    $conn->exec($sql);
    echo "User created successfully \n";
    goto A;
  } elseif ($action == '2') {

    echo "Enter username: ";
    $username = readline();
    echo "Enter password: ";
    $password = readline();

    $sql = "SELECT * FROM users";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll();

    $found = false;

    foreach ($result as $row) {
      if ($row['username'] == $username && $row['password'] == $password) {
        $found = true;
        break;
      }
    }

    if ($found) {
      echo "User logged in successfully\n";
    } else {
      echo "User information is not correct\n";
    }

    goto A;

  } else {
    echo "Invalid action\n";
  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>