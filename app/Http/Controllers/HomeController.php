<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function book()
    {
        $carid = $_POST["carID"];
        return view('booking', ['carid' => $carid]);
    }

    public function pay()
    {
        
        return view('payment', [
            'carID'  => $_POST["carID"],
            'datefrom'  => $_POST["datefrom"],
            'dateto'  => $_POST["dateto"],
            'name'  => $_POST["name"],
            'email'  => $_POST["email"],
            'phone'  => $_POST["phone"]
        ]);
    }
	
    public function adminLogin()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        return view('login_check', ['username' => $username],['password' => $password]);
    }
	
    public function userLogin()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        return view('login_check_user', ['username' => $username],['password' => $password]);
    }
	
    public function userRegister()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        return view('register_check', ['username' => $username],['password' => $password]);
    }
	 
    public function passwordChange()
    {
        $oldpassword = $_POST["oldpassword"];
        $newpassword = $_POST["newpassword"];
        return view('password_change', ['oldpassword' => $oldpassword],['newpassword' => $newpassword]);
    }
}
