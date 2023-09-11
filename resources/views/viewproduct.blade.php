<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="push-top">
                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div><br />
                    @endif
                    <table class="table">
                      <thead>
                          <tr class="table-warning">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Category</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td class="text-center">Action</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $product)
                          <tr>
                              <td>{{$product->id}}</td>
                              <td>{{$product->name}}</td>
                              <td>{{$product->category}}</td>
                              <td>{{$product->description}}</td>
                              <td>{{$product->price}}</td>
                              <td>{{$product->quantity}}</td>
                              <td class="text-center">
                                  <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                                  <form action="{{ route('products.destroy', $product->id)}}" method="post" style="display: inline-block">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-block btn-danger bg-gray-800 btn-sm"" type="submit">Delete</button>
                                    </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  <div>               
            </div>
        </div>
    </div>

    

</x-app-layout>
