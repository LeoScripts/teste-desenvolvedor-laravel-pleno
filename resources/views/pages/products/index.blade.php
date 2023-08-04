<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Products') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg first:m-[-100px]">
        <a href="{{route('products.create')}}" class="inline-flex items-center justify-right px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ">New Product</a>
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <table class="w-full">
            <thead class="border-b-2 border-gray-300">
              <tr>
                <th class="text-left p-4 font-semibold text-gray-600">Nome</th>
                <th class="text-left p-4 font-semibold text-gray-600">Descrição</th>
                <th class="text-left p-4 font-semibold text-gray-600">Categoria</th>
              </tr>
            </thead>
            <tbody class="w-full">
              @foreach($products as $product)
              <a href="{{route('dashboard', $product->id)}}" class="border-2 border-green-400">
                <tr class="border-b border-gray-300   hover:bg-gray-50">
                  <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->name}}</td>
                  <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->description}}</td>
                  <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->categories}}</td>
                </tr>
              </a>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
