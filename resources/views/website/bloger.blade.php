@extends('website.template.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('website/img/contact-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>create  blog</h1>
                     
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>write your blog </p>

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session('message')}}
                    </div>
                @endif
                <form method="post" action="{{url('/blogerpostsave')}}">
                    {{ csrf_field() }}
                
                    <div class="form-group floating-label-form-group controls">
                        <label>thumbnail</label>
                        <textarea rows="5" name="thumbnail" class="form-control" placeholder="thumbnail" id="thumbnail" required
                                  data-validation-required-message="Please enter a thumbnail."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>


                    
                    <div class="form-group floating-label-form-group controls">
                        <label>title</label>
                        <textarea rows="5" name="title" class="form-control" placeholder="title" id="title" required
                                  data-validation-required-message="Please enter a title."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>


                    
                    <div class="form-group floating-label-form-group controls">
                        <label>details</label>
                        <textarea rows="5" name="details" class="form-control" placeholder="details" id="details" required
                                  data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>



                    <div class="form-group @if($errors->has('category_id')) has-error @endif">
                        {!! Form::label('Category') !!}
                        {!! Form::select('category_id[]', $categories, null, ['class' => 'form-control', 'id' => 'category_id', 'multiple' => 'multiple']) !!}
                        @if ($errors->has('category_id'))
                            <span class="help-block">{!! $errors->first('category_id') !!}</span>
                        @endif
                    </div>

                    <div class="form-group floating-label-form-group controls">
                        <label>country</label>
                        <textarea rows="5" name="country" class="form-control" placeholder="country" id="country" required
                                  data-validation-required-message="Please enter a country."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>



                    <div class="form-group">
                     <input type="submit" name="send" class="btn btn-info" value="Send" />
                    </div>
                   </form>
            </div>
        </div>
    </div>
@endsection()