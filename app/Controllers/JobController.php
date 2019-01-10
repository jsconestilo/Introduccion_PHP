<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;

class JobController extends BaseController {
    
    public function create() {
        return $this->renderHTML('addJob.twig');
    }

    public function store($request) {
        if($request->getMethod() == 'POST') {
            $responseMessage = null;

            $postData = $request->getParsedBody();
            
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                             ->key('description', v::stringType()->notEmpty())
                             ->key('months', v::intVal()->notEmpty());

            try {
                $jobValidator->check($postData);

                $job = new Job();
                $job->title = $postData['title'];
                $job->description = $postData['description'];
                $job->months = $postData['months'];
                $job->visible = $postData['visible'];

                $job->save();

                $responseMessage = 'Save';
            } catch(ValidationException $e) {
                $responseMessage = $e->getMainMessage();
            }
            
            
        }
        
        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

} 