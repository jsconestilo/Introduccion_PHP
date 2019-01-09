<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use Libsxpsmart\Project as NewProject;

class IndexController extends BaseController {

    public function index() {
        $name = 'Alejandro González Reyes';
        //Limit para mostrar las experiencias de trabajo menores o iguales a 20 meses
        $limiteMeses = 400;
        $totalMeses = 0;

        $jobs = Job::all();
        $projects = Project::all();
        $lib_project = new NewProject();

        return $this->renderHTML('index.twig', [
            'name' => $name,
            'limiteMeses' => $limiteMeses,
            'totalMeses' => $totalMeses,
            'lib_project' => $lib_project,
            'jobs' => $jobs,
            'projects' => $projects,
        ]);
    }

}