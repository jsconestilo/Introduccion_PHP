<?php 

namespace App\Controllers;

use App\Models\Project;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;

class ProjectController extends BaseController {

    public function create() {
        return $this->renderHTML('addProject.twig');
    }

    public function store($request) {
        if($request->getMethod() == 'POST') {
            
            $responseMessage = null;

            $postData = $request->getParsedBody();

            $projectValidator = v::key('title', v::stringType()->notEmpty())
                             ->key('description', v::stringType()->notEmpty())
                             ->key('technologies', v::stringType()->notEmpty());

            try {
                $projectValidator->check($postData);

                $project = new Project();
                $project->title = $postData['title'];
                $project->description = $postData['description'];
                $project->technologies = $postData['technologies'];
                $project->save();

                $responseMessage = "Saved";
            } catch(ValidationException $e) {
                $responseMessage = $e->getMainMessage();
            }
            
        }

        return $this->renderHTML('addProject.twig', ['responseMessage' => $responseMessage]);
    }

}