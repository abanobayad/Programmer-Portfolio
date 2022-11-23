<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use App\Models\Quality;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testmonial;
use App\Models\Certificate;
use App\Models\Project;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $about = Aboutme::first();
        $edus = Quality::where('type' , 'education')->get();
        $exps = Quality::where('type' , 'expericence')->get();
        $skills = Skill::all();
        $services = Service::all();
        $tests = Testmonial::all();
        $certs = Certificate::all();
        $projects = Project::all();

        $bdate=$about->date_of_birth->translatedFormat('j F Y');


        // dd($services);

        return view('index' , compact('about' , 'edus' , 'exps' , 'skills' , 'services' , 'tests' , 'bdate' , 'certs' , 'projects'));
    }
}
