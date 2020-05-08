

@foreach($projects as $project)
<div class="single-project set-bg {{$project->project_type_id}}" data-setbg="{{ asset('uploads/'.$project->master_poster) }}" 
    style="background-size: cover;">
				<div class="project-content">
					<h2>
                        @if(app()->getLocale()=='en')
						{{$project->type->en_type}}
						@else
						{{$project->type->ar_type}}
                        @endif 
                    </h2>
					<p>
                    <?php $date = date_create($project->project_date)?>
                    {{ date_format($date,"d M, Y") }} 
                    </p>
					<a href="{{ url('projectDetails/'.$project->id) }}" class="seemore">See Project </a>
				</div>
            </div>
            @endforeach