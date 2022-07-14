<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = NULL)
    {
        $session = session();
        $chek = 0;
        $userData = $session->get('userdata');
        if (isset($userData['is_login']) && $userData['is_login'] == true)
            $chek = 1;

        if($chek == 0){
            return redirect()->route('login_rak');
        }

        /*if(session()->get('logged_in') !== true)
        {
           //return redirect()->to('login');
           return redirect()->route('login_rak');
        }*/
    }


    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
    {
        // Do something here
    }
}