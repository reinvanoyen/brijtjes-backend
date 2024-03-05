<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::ordered()->get());
    }

    public function getBySlug(string $slug)
    {
        return new ProjectResource(Project::where('slug', $slug)->firstOrFail());
    }
}
