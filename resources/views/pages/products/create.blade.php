<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Novo Produto') }}
    </h2>
  </x-slot>

  <x-slot name="main">
    oi
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="/products" method="post" class="w-full flex flex-col ">
            @csrf
            <div class="w-full flex items-center justify-center gap-2">
              <input class="p-2" type="text" name="name" placeholder="Nome do Produto">
              <input class="p-2" type="text" name="categories" placeholder="Categoria do Produto">
            </div>
            <textarea name="description" cols="10" rows="5" class="" placeholder="Digite uma descrição"></textarea>
            <div class="flex items-center gap-4">
              <a href="{{route('products.index')}}" class="mt-2 px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300">Cancelar</a>
              <button type="submit" class=" mt-2 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300">Criar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
