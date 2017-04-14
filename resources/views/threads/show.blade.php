@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="#">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
                </div>

                <div class="panel-body">
                   {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@foreach($thread->replies as $reply)
	        	@include('threads.reply')
            @endforeach
        </div>   
    </div>

    @if(Auth::check())
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<form method="POST" action="{{ url('threads').'/'. $thread->id . '/replies' }}">
        		{{ csrf_field() }}
        		<div class="form-group">
        			<textarea name="body" class="form-control" placeholder="Something to Say?" row="5"></textarea>

        		</div>
        		<button type="submit" class="btn btn-default">Post</button>
        	</form>
        </div>   
    </div>
    @else
    <p class="text-center">Please <a href="{{ url('login') }}">Signin</a> to Join Discussions!</p>
    @endif
</div>
@endsection
