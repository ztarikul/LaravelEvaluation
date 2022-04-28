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
            <td>{!! $product->description !!}</td>
            <td>{{ $product->Subcategory->title}}</td>
            <td>{{ $product->price}}</td>
            <td><img class="zoom" width="50" height="50" src="{{ asset('storage/'.$product->thumbnail)}}" alt=""></td>
            <form method="post" action="{{route('product.destroy',$product->id)}}">
                @csrf
                @method('DELETE')

                <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete"></td>

            </form>



        </tr>
        @endforeach
</table>