<?php

namespace App\Controllers;

use App\Models\Job;

class JobController extends BaseController {

    public function create() {
        echo $this->renderHTML('addJob.php');
    }

    public function store($request) {
        if($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();
            
            $job = new Job();
            $job->title = $postData['title'];
            $job->description = $postData['description'];
            $job->months = $postData['months'];
            $job->visible = $postData['visible'];

            $job->save();
        }
        
        require_once '../views/addJob.php';
    }

} 