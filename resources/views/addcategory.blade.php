<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Categories') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900">
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
                          <form method="post" action="{{ route('categories.store') }}">
                              <div class="form-group ">
                                  @csrf
                                  <label for="name">Please Insert Category</label>
                                  <input type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="name" required/>
                              </div>
                              
                              <button type="submit" class="btn btn-block btn-danger bg-gray-800 " style="padding: 5px 10px; ">Add Category</button>
                          </form>
                      </div>
                </div>
            </div>
        </div>
    </div></div>
    </select>
</x-app-layout>
