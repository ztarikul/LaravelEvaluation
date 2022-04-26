<x-admin-master>


    @section('content')


    <!-- Blog Post -->
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data" id="create_product_frm">
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" style="color:black;">
                    <label for="title"><b>Product Title</b></label>
                    <input type="text" class="form-control" style="width:70%" name="title" value="" id="title" aria-describedby="" placeholder="enter product title">
                </div>
                <div class="form-group" style="color:black;">
                    <label for="title"><b>Description</b></label>
                    <textarea type="text" id="mytextarea" class="form-control" style="width:70%" name="description" id="title" aria-describedby=""> </textarea>
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

    <div id="productlist">

        @include('admin.products.productlist')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script>
        $("#create_product_frm").submit(function(e) {
            e.preventDefault();

            jQuery.ajax({
                url: "{{route('product.store')}}",
                data: jQuery('#create_product_frm').serialize(),
                type: 'post',
                success: function(post) {

                    jQuery('#create_product_frm')[0].reset();
                    jQuery('#productlist').html(post);

                }

            });


        });
    </script> -->








    @endsection
</x-admin-master>