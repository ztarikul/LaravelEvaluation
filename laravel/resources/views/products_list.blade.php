<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laravel Evaluation</title>
</head>
<body>
    <section>
        <div class="card">
                <div class="card-header">
                    <h1>Product List</h1>
                    <a href="/"></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Subcategory</th>
                                    <th>Thumbnail</th>
                                    <th>Price</th>
                                    <th>Delete Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($product as $list)
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->title}}</td>
                                        <td>{{$list->description}}</td>
                                        <td>{{$list->subcategory}}</td>
                                        <td>{{$list->thumbnail}}</td>
                                        <td>{{$list->price}}</td>
                                        <td>
                                            <a href="/delete_product/{{$list->id}}"><button class="btn btn-danger">Delete</button></a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>