@extends('website.template.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('website/img/contact-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                    as
                    possible!</p>

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session('message')}}
                    </div>
                @endif
                <form method="post" action="{{url('/contact')}}">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name" required
                                   data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required
                                   data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required
                                  data-validation-required-message="Please enter a message."></textarea>
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