<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;

class UserController extends BaseController {

    public function create() {
        return $this->renderHTML('addUser.twig');
    }

    public function store($request) {
        if($request->getMethod() == "POST") {
            $responseMessage = null;
            $postData = $request->getParsedBody();

            $userValidator = v::key('username', v::email()->notEmpty())
                             ->key('password', v::stringType()->notEmpty()->length(6, 15));

            try {
                $userValidator->check($postData);
                $user = new User();
                $user->username = $postData['username'];
                $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user->save();
                $responseMessage = "Guardado satisfactoriamente";
            } catch(ValidationException $e) {
                $responseMessage = $e->getMainMessage();
            }
        }
        return $this->renderHTML('addUser.twig', ['responseMessage' => $responseMessage]);
    }

}