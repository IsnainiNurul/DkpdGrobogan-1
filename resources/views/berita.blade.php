
	
<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <style> h5{
 
 white-space: pre-wrap;
 }</style>
</head>
<body>
	<div class="row">
		<div class="container">
 
			<div class="col-lg-8 mx-auto my-5">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
 				
				@foreach($berita as $g)
					{{$g->created_at}}

                        <h1>{{$g->Judul}}</h1><br>
						@if($g->file != 0)
							<img src="{{ url('/data_file/'.$g->file) }}"><br>\n
						@endif
							<h5>{{$g->Berita}}</h5>
					
						@endforeach
</body>
</html>