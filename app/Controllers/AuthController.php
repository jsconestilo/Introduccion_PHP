<?php

namespace App\Controllers;

use App\Models\User;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {

    public function login() {
        return $this->renderHTML('login.twig');
    }

    public function access($request) {
        if($request->getMethod() == "POST") {
            $responseMessage = null;
            $postData = $request->getParsedBody();

            $user = User::where('username', $postData['username'])->first();

            if($user) {
                if(password_verify($postData['password'], $user->password)) {
                    //Guardar una sessión en el navegador del usuario
                    $_SESSION['userId'] = $user->id;
                    return new RedirectResponse('/admin');
                } else {
                    $responseMessage = "Credenciales incorrectas";
                }
            } else {
                $responseMessage = 'Credenciales incorrectas';
            }
            return $this->renderHTML('login.twig', ['responseMessage' => $responseMessage]);
        }
    }

    public function logout() {
        unset($_SESSION['userId']);
        return new RedirectResponse('/login');
    }

    public function loginRequired() {
        return new RedirectResponse('/login');
    }

}