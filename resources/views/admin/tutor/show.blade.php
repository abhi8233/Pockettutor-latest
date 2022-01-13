<div class="row">
@foreach($userDocument as $doc)
	<div class="col-md-4">
		@if($doc->document_type == "image")
			<h6> {{ ucwords(str_replace("_"," ",$doc->document_key)) }} </h6>
			<img src="{{ URL::asset('assets/images/document/'.$doc->document_value) }}" alt="javaTpoint" width="104" height="142"> 
			<a href="{{ URL::asset('assets/images/document/'.$doc->document_value) }}" download ><button class="btn btn-secondary">Download</button>
			</a>
		@else
			<h6> {{ ucwords(str_replace("_"," ",$doc->document_key)) }} </h6>
			<img src="{{ URL::asset('assets/images/icons/pdf-icon.svg') }}" alt="javaTpoint" width="104" height="142">  
			<a href="{{ URL::asset('assets/images/document/'.$doc->document_value) }}" download ><button class="btn btn-secondary">Download</button>
			</a>
		@endif
	</div>
@endforeach
</div>