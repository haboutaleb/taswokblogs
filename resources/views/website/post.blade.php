@extends('website.template.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ $post->thumbnail }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>

                        <h2 class="subheading">{{ $post->sub_title }}</h2>
                        <h2 class="subheading">{{ $post->country }}</h2>

                        <span class="meta">Posted by
              <a href="#">{{ $post->user->name }}</a>
              on {{ date('M d, Y', strtotime($post->created_at)) }}</span>
         
            </div>
      

                </div>
            </div>
        </div>
    </header>


    <div class="card-body">
        {!! Form::open(['route' => ['storecomment',$post->id], 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group @if($errors->has('comment')) has-error @endif">
        
            <div class="form-group @if($errors->has('comment')) has-error @endif">
                {!! Form::label('comment') !!}
                {!! Form::text('comment', null, ['class' => 'form-control', 'placeholder' => 'comment']) !!}
                @if ($errors->has('comment'))
                    <span class="help-block">{!! $errors->first('comment') !!}</span>@endif
            </div>
        </div>

        {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10 mx-auto">
            
                    {{ $post->details }}
                </div>
                <div class="col-lg-12 col-md-10 mx-auto">
                    <h1 class="d-block">user comment</h1>

                @foreach($post->comments as $one)
                <p>user comment <h1 class="d-block">{{ $one->comment }}</h1></p>
               <p>time<h1 class="d-block">{{ $one->created_at }} </h1></p>
               <p>user name<h1 class="d-block">{{ $one->user->name }}</h1></p>
               <br>
                @endforeach ($comments as $one)
            </div>
            </div>
        </div>
    </article>
@endsection()