@extends('layouts.app')

@section('title', 'Contact Us')

@section('heading', 'Contact Us')

@section('body')
	
       <p>At RifeConnect, we love to get feedbacks. Please use the form below to contact us and be rest assured that we will get back to you as soon as we can. Thanks.</p>
       <form class="form-horizontal" method="POST" action="{{ route('contact_us') }}">
       		{{csrf_field()}}
		  <fieldset>
		    <legend><center><h3>Fill the Form</h3></center></legend>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Phone | Email</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputEmail" placeholder="Email or Phone Number" type="text" name="contact" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputPassword" class="col-lg-2 control-label">Subject</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputSubject" placeholder="Subject" type="text" name="subject" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Message</label>
		      <div class="col-lg-10">
		        <textarea class="form-control" rows="3" id="textArea" name="message" required></textarea>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">Cancel</button>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	                
@endsection