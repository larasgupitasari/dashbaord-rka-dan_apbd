<?php

namespace App\Controllers;
use App\Models\Login_model;
use CodeIgniter\HTTP\IncomingRequest;


class Login extends BaseController
{

    public function __construct()
    {
        $this->Login_model = new Login_model();
    }

    function login_rak($param = '') {
        if ($param == 'error') {
            $param = '<div class="alert alert-danger text-center" style="font-weight:bolder">Login gagal!  Username / Password Salah!</div>';
        } else if ($param == 'available') {
            $param = '<div class="alert alert-warning text-center" style="font-weight:bolder">Login gagal!  Username tidak terdaftar!</div>';
        }
        $data = array('title' => 'Login', 'message' => $param, 'base_url' => base_url());
        return view('login/login_view1', $data);
    }

    function login_apbd($param = '') {
        if ($param == 'error') {
            $param = '<div class="alert alert-danger text-center" style="font-weight:bolder">Login gagal!  Username / Password Salah!</div>';
        } else if ($param == 'available') {
            $param = '<div class="alert alert-warning text-center" style="font-weight:bolder">Login gagal!  Username tidak terdaftar!</div>';
        }
        $data = array('title' => 'Login', 'message' => $param, 'base_url' => base_url());
        return view('login/login_view2', $data);
    }

    function do_login() {
        $request = service('request');
        $user = $request->getPost('username');
        $pass =  $request->getPost('password');

        $pass = md5($pass);

        $datauser = $this->Login_model->getDataUserPass(strtolower($user),$pass);
        $session = session();

        if (!empty($datauser)) {
            $session_set = array(
                'is_login' => true,
                'username' => $user,
                'userdata' => $datauser
            );
            $session->set("userdata",$session_set);

            return redirect()->route('DasboardAnggaranKAS');
            
        }  
        else {
            return redirect()->route('login_rak');
        }
        
    }

    function do_login2() {
        $request = service('request');
        $user = $request->getPost('username');
        $pass =  $request->getPost('password');

        $pass = md5($pass);

        $datauser = $this->Login_model->getDataUserPass(strtolower($user),$pass);
        $session = session();

        if (!empty($datauser)) {
            $session_set = array(
                'is_login' => true,
                'username' => $user,
                'userdata' => $datauser
            );
            $session->set("userdata",$session_set);

            return redirect()->route('DashboardAPBD');
            
        }  
        else {
            return redirect()->route('login_apbd');
        }
        
    }

    function log_outrak() {
        session()->stop();
        session()->destroy();
        return redirect()->route('login_rak');
        
    }

    function log_outapbd() {
        session()->stop();
        session()->destroy();
        return redirect()->route('login_apbd');
        
    }
    
    
    public function ubah_password()
    {
       echo 'masuk';
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $password_baru_re = $this->input->post('password_baru_re');
        $password_lama = md5($password_lama);
        $username = $this->ci->session->userdata('usernamescm');
        
        $pass = md5($password_lama);
        $data_karyawan = $this->Login_model->getDataUserPass(strtolower($username),$pass);
        if($password_baru != $password_baru_re)
            echo 2;
        else if(count($data_karyawan) <= 0)
            echo 3;
        else
        {
            $password_baru = md5($password_baru);
            $this->Login_model->updateUser($password_baru,$username);
            echo 1;
        }
    }
}
