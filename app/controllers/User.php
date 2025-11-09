<?php
class User
{
  use Controller;

  public function login($a = '', $b = '', $c = '', $d = '')
  {
    if($_SERVER['REQUEST_METHOD']=="POST") {
      $userData = new BkrUser;
      $arr['Email'] = $_POST['email'];
      $arr['Password'] = $_POST['password'];
      $user = $userData->where($arr);
      
      if ($user) {
        $_SESSION["userid"] = $user[0]['Id'];
        $_SESSION["username"] = $user[0]['Username'];
        $_SESSION["admin"] = $user[0]['IsAdmin'];
        redirect('home');
      } else {
        redirect('user/login?e=1');
    }
    }
    $this->view('login');
  }

  public function signup($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $userData = new BkrUser;
      $arri["Username"] = $_POST["username"];
      $arri["Email"] = $_POST["email"];
      $arri["Password"] = $_POST["password"];
      $id=$userData->insert($arri);
      show($id);
      $arr['Email'] = $_POST['email'];
      $arr['Password'] = $_POST['password'];
      
      $user = $userData->where($arr);
      //echo count($user);

      if ($user) {
        $_SESSION["userid"] = $user[0]['Id'];
        $_SESSION["username"] = $user[0]['Username'];
        $_SESSION["admin"] = $user[0]['IsAdmin'];
        //redirect('home?id=' . $id);
      } else {
        redirect('user/login');
      }
    }
    $this->view('signup');
  }

  public function profile($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    $userData = new BkrUser;
    $users = $userData->findAll();
    $this->view('profile');
  }
}
