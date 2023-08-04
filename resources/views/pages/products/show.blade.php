<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Product details') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <table class="w-full">
              <thead class="border-b-2 border-gray-300">
                <tr>
                  <th class="text-left p-4 font-semibold text-gray-600">#</th>
                  <th class="text-left p-4 font-semibold text-gray-600">Nome</th>
                  <th class="text-left p-4 font-semibold text-gray-600">Categoria</th>
                  <th class="text-left p-4 font-semibold text-gray-600">Descrição</th>
                </tr>
              </thead>
              <tbody class="w-full">
                <a href="{{route('dashboard', $product->id)}}" class="border-2 border-green-400">
                  <tr class="border-b border-gray-300   hover:bg-gray-50">
                    <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->id}}</td>
                    <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->name}}</td>
                    <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->categories}}</td>
                    <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$product->description}}</td>
                  </tr>
                </a>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
