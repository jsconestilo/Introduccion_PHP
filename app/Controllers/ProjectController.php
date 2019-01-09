<?php 

namespace App\Controllers;

use App\Models\Project;

class ProjectController extends BaseController {

    public function create() {
        return $this->renderHTML('addProject.twig');
    }

    public function store($request) {
        if($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();

            $project = new Project();
            $project->title = $postData['title'];
            $project->description = $postData['description'];
            $project->technologies = $postData['technologies'];
            $project->save();
        }

        return $this->renderHTML('addProject.twig');
    }

}