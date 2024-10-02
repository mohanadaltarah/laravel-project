<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
});

Route::get('/jobs', function (){
    $jobs = Job::with('employer')->latest()->paginate(10);
    return view('jobs.index', [
        'jobs'=> $jobs
    ]);
});

Route::get('/jobs/create', function (){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);

    return view('job.show', ['job'=>$job]);
});

Route::post('/jobs', function (){
    request()->validate([
        'title'=>['required', 'min:3'],
        'salary'=>['required']
    ]);

    Job::create(
        [
            'title'=> request('title'),
            'salary'=> request('salary'),
            'employer_id'=> 1
            ]
    );

    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});

