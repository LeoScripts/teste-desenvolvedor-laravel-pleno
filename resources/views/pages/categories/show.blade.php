<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Detalhes da Categoria') }}
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
                  <th class="text-left p-4 font-semibold text-gray-600">Descrição</th>
                </tr>
              </thead>
              <tbody class="w-full">
                <div class=" w-full flex items-center justify-end gap-4 px-4 ">
                  <a href="{{route('categories.edit', $category->id)}}" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300">Editar</a>
                  <a href="{{route('categories.destroy', $category->id)}}" class="px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300">Deletar</a>
                </div>
                <td class=" text-left py-2 px-4 font-light text-gray-700 text-sm">{{$category->id}}</td>
                <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$category->name}}</td>
                <td class="text-left py-2 px-4 font-light text-gray-700 text-sm">{{$category->description}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
