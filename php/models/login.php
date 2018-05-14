<?php
session_start();
include_once '../core/config.php';
  $login = $_POST['login'];
  $password = md5($_POST['pass']);
  // если в форме входа нажата кнопка войти
  if(isset($_POST['submit'])){
    $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $result = $mysqli->query($sql);
    $row = $result->num_rows;
    if($row != 0){
      $row = mysqli_fetch_assoc($result);
      // заносим в сессию тип пользователей и проверяем
      $_SESSION['state_id'] = $row['state_id'];
      // если логин info
      if($_SESSION['state_id'] == 1){
        header('Location: ../views/infotablo.php');
      }
      // если логин user
      if($_SESSION['state_id'] == 2){
        header('Location: ../views/rabotnik.php');
      }
      // если логин terminal
      if($_SESSION['state_id'] == 3){
        header('Location: ../views/terminal.php');
      }
    }
    else{
      header('Location: ../../index.php?error=true');
    }
  }
?>

