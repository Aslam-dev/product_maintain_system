<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="card push-top">
                        <div class="card-header">
                         Pless Add Product Details
                        </div>
                        <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                 {{ session('success') }}
                             </div>
                         @endif
                          @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br />
                          @endif
                            <form method="post" action="{{ route('products.store') }}">
                                <div class="form-group">
                                    @csrf
                                    <label for="name">Name</label>
                                    <input type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="category">Select a Category:</label>
                                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"  name="category" id="category" required>
                                             <option value="" disabled selected>Please select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="description"/>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number"  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="price" name="price" step="0.01" min="0.01" placeholder="0.00" required/>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="quantity" required/>
                                </div>
                                <button type="submit" class="btn btn-danger bg-gray-800" style="padding: 5px 10px; ">Add Product</button>              
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
