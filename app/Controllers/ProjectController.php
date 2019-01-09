<?php 

namespace App\Controllers;

use App\Models\Project;

class ProjectController {

    public function create() {
        require_once '../views/addProject.php';
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

        require_once '../views/addProject.php';
    }

}