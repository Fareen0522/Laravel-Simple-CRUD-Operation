@extends('products.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                         @if(Auth::user())
                         <a href="{{ route('products.create') }}" class="btn btn-success btn-sm" title="Add New Products">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Products
                        </a>
                                @else
                                <a class="btn btn-outline-secondary button" disable href="{{route('login')}}">login
                                    first</a>
                                @endif
                       
                        <br/>
                        <br/>
                        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr> 
                                        {{-- <td scope="col" class="">{{$key+1}}</td> --}}
                                        <td>{{ $loop->iteration }}</td> 
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->image }}</td>
                                        <td>
                                            @if($product->image !=null)
                                                <img src="{{asset('/uploads/images/'.$product->image)}}" alt="image"
                                                     width="100" height="100p" class="img img-responsive"/>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('products.destroy', $product->id) }}"   enctype="multipart/form-data">
                                            <div class="row">
                                                
                                                <div class="col">
                                                    <a href="{{route('products.edit',$product->id)}}"><i class="bi bi-pencil"><button type="button" class="btn btn-info">Edit</button></i></a>
                                                </div>
                                            </div>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection