@extends('front.layout.master')
@section('content')

<section class="position-relative page-header abt-page-header">
  	<wrapper></wapper>
 	<div class="page-head">
   		<span class="main-title">{{$result->title}}</span>
  	</div>
</section>

<section class="about-content">
  	<div class="container">
  		<div class="about-content">
         <div>
            <h2>{{$result->title}}</h2>
         </div>
        	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                <div class="abt-text abt-margin">
                   
               {!! $result->description !!}
               
            </div>
            </div>
        	</div>
    	</div>
	</div>
</section>

@endsection