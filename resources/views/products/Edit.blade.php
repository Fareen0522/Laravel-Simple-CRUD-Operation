<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Edit Product Info</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
      
        <div id="page-content-wrapper">
        
            <form method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <h1>Edit Product Details</h1>
                    <hr>
                    {{-- <input type="hidden" name="wasted_fooditems_id" value="{{$product->id}}">
                    <label for="name"><b> Item Name</b></label> --}}
                    <input type="text" for="name" name="name" id="name" value="{{$product->name}}" placeholder="Enter item name..">

                    <label for="price"><b>Quantity</b></label>
                    <input type="text" for="quantity" name="quantity" id="quantity" value="{{$product->quantity}}" placeholder="Enter quantity"><br><br>

                    <label for="price"><b>Price</b></label>
                    <input type="text" for="price" name="price" id="price" value="{{$product->price}}" placeholder="Enter Price"><br><br>

                    <input type="file" for="image" name="image" id="image" class="form-control image" value="{{$product->image}}"><br><br>
                    <div class="form-control image"><img src="{{'/uploads/images/'.$product->image}}" alt="" width="70" height="70">
                    </div>
                    <hr>
                    <button type="submit" class="registerbtn">Submit</button>
                </div>
            </form>
            <div class="container signin">
                {{-- <p>Go Back to DashBoard<a href="{{route('dashboard')}}">DashBoard</a>.</p> --}}
            </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>

</html>
