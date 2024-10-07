<h2>
    {{$job->title}}
</h2>

<p>
    Congrats, the job you recently created was successfully published!
</p>

<a href={{url('/jobs/' . $job->id)}}>You can view your job from here</a>
