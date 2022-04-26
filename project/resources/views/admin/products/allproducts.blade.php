<x-admin-master>


    @section('content')


    <!-- Blog Post -->
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data" id="create_product">
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" style="color:black;">
                    <label for="title"><b>Product Title</b></label>
                    <input type="text" class="form-control" style="width:70%" name="title" value="" id="title" aria-describedby="" placeholder="enter product title">
                </div>
                <div class="form-group" style="color:black;">
                    <label for="title"><b>Description</b></label>
                    <input type="text" class="form-control" style="width:70%" name="description" id="title" aria-describedby="" placeholder="max length 250">
                </div>

                <div class="form-group" style="color:black;">
                    <label for="title"><b>Price</b></label>
                    <select class="form-select" aria-label="Default select example" style="width:70%" style="width:70%" name="subcategory_id">
                        <option selected>Open this select menu</option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                        @endforeach

                    </select>
                </div>



                <div class="form-group" style="color:black;">
                    <label for="title"><b>Price</b></label>
                    <input type="number" class="form-control" style="width:70%" name="price" id="title">
                </div>
                <div class="form-group" style="color:black;">
                    <label for="title"><b>Thumbnail</b></label>
                    <input type="file" name="thumbnail" class="form-control" id="name" aria-describedby="">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>
    </form>
    <div id="message"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        jQuery('#create_product').submit(function(e) {
            e.preventDefault();

            jQuery.ajax({
                url: "{{route('product.store')}}",
                data: jQuery('#create_product').serialize(),
                type: 'post',
                success: function(result) {
                    jQuery('#message').html(result.msg);
                }
            });
        });
    </script>




    <table class="table table-blue table-striped">
        <thead>
            <tr>


                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Price</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Delete</th>


            </tr>
        </thead>
        <tbody>
            @foreach( $products as $product)
            <tr>
                <!-- @method('DELETE') -->

                <td>{{ $product->title }}</td>
                <td>{{ $product->description}}</td>
                <td>{{ $product->Subcategory->title}}</td>
                <td>{{ $product->price}}</td>
                <td><img class="zoom" width="50" height="50" src="{{ asset('storage/'.$product->thumbnail)}}" alt=""></td>
                <form method="post" action="{{route('product.destroy',$product->id)}}">
                    @csrf
                    @method('DELETE')

                    <td><input type="submit" class="btn btn-danger btn-sm" value="Delete"></td>

                </form>



            </tr>
            @endforeach
    </table>
    @endsection
</x-admin-master>