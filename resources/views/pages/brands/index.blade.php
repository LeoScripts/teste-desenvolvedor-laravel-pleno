<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Marcas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg first:m-[-100px]">
        <div class=" w-full flex items-center justify-end px-4">
          <a href="{{route('brands.create')}}" class="mt-6 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300">Nova Marca</a>
        </div>
        <div class=" text-gray-900 dark:text-gray-100">
          <table class="w-full">
            <thead class="border-b-2 border-gray-300">
              <tr>
                <th class="text-left p-4 font-semibold text-gray-600">#</th>
                <th class="text-left p-4 font-semibold text-gray-600">Nome</th>
              </tr>
            </thead>
            <tbody class="w-full">
              @foreach($brands as $brand)

              <tr onclick=location.href="{{route('brands.show', $brand->id)}}" style="cursor: pointer" class="border-b border-gray-300 hover:bg-gray-50">
                <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$brand->id}}</td>
                <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$brand->name}}</td>
              </tr>

              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      {{$brands->links()}}
    </div>
  </div>
</x-app-layout>
