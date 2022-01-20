<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ URL::asset('css/details.css'); }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Details</title>
  </head>
  <body>

<input type='text' id='search' placeholder='filter'>







</div>


<div class='container'>
  <div class='row'>

    <div class='col-8'>
    
    
  
    
    <table class="table table-bordered" style='margin-left:31%; margin-top:15px;' id='show'>
  <thead id='thead'>
    <tr>
    
      
  
      
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Subcategory_ID</th>
      <th scope="col"> Price</th>
      <th scope="col">Thumbnail</th>
      
      <th rowspan="2"> Action</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($products as $product)
<td>{{$product->id}}</td>
<td>{{$product->title}}</td>
<td>{{$product->description}}</td>
<td>{{$product->subcategory_id}}</td>
<td>{{$product->price}}</td>
<td><img src="{{asset($product->thumbnail)}}"></td>
<td><a onclick="return confirm('Are you sure ?')"  href="{{url('/delete/'.$product->id)}}" >Delete</a></td>



</tbody>
@endforeach

@if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
@endif



<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
console.log($value);
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('table').html(data);

}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
    
    </script>



</body>

</html>