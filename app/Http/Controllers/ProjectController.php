<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::paginate(20);
        $categories = Category::get();
        return view("pages.projects.index", compact("projects", "categories"));
    }

    public function getProjectsCategory($id)
    {
        $projects = Project::where("category_id",$id)->paginate(20);
        $categories = Category::get();
        return view("pages.projects.index", compact("projects", "categories"));
    }

    public function getMyProjectsCategory($id)
    {
        $projects = Project::where("category_id",$id)->whereUsersId(Session::get("user")->id)->paginate(20);
        $categories = Category::get();
        return view("pages.projects.myindex", compact("projects", "categories"));
    }

    public function detailproject($id)
    {
        $project = Project::find($id);
        if ($project->users_id!=Session::get("user")->id)
        {
            Project::whereId($id)->update(["goruntulenme"=>$project->goruntulenme+1]);
        }
        return view("pages.projects.detailproject", compact("project",));
    }

    public function download(){

        return Storage::disk("s3")->download($_GET['path']);
    }

    public function myprojects()
    {
        $projects = Project::whereUsersId(Session::get("user")->id)->paginate(20);
        $categories = Category::get();
        return view("pages.projects.myindex", compact("projects", "categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'ad' => 'required',
            'icerik' => 'required',
        ]);

        $data = $request->except(["_token", "ekler"]);
        $data["users_id"] = Session::get("user")->id;
        $project = Project::create($data);
        $files = $request->file("ekler");
        $yol = [];
        foreach ($files as $key=>$file) {
            $path = "project/" . $project->id;
            $filename = $key .date("dmYHis") . "." . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, "s3");
            $yol[] = $path . "/" . $filename;
        }

        Project::whereId($project->id)->update(["ekler" => json_encode($yol)]);

        return redirect()->route('projects.detailproject',$project->id)
            ->with('success', 'Projen sisteme eklendi.');
    }
}
