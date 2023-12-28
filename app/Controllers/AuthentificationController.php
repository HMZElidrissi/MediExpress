<?php
namespace App\Controllers;
use App\Models\PatientEnLigne;

class AuthentificationController{

    private $PatientEnLigne;
    private $data;

    public function __construct(){
        $this->PatientEnLigne = new PatientEnLigne();
        
    }

    public function singIn(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            extract($_POST);
            $login = $this->PatientEnLigne->login($email, $password);
            // print_r($login);
            // die();
            if (isset($login) && password_verify($password, $login->password)) {
                
                $_SESSION['id'] = $login->id;
                $_SESSION['username'] = $login->username;
                $_SESSION['role'] = $login->user_type;
                if ($_SESSION['role'] == 'admin') {
                    header('location: /');
                }else header('location: /');
            }else {
                $_SESSION['error'] = "Your email or password is incorrect";
                header('location: /login');
            }
        }
    }

    public function singUp(){
        extract($_POST);
        $this->data = ['username' => $username, 'email' => $email, 'password' => $password, 'cpassword' => $cpassword, 'user_type' => 'patient'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            if ($this->PatientEnLigne->login($email, $password)) {
                $_SESSION['error'] = "this email is already existed";
            }else {
                if ($password == $cpassword) {
                    $this->PatientEnLigne->register($this->data);
                    header('location: /login');
                }else{
                    $_SESSION['error'] = "The passwords you entered don't match";
                    header('location: /register');
                }
            }
        }
    }
}
$auth = new AuthentificationController();
$auth->singIn();