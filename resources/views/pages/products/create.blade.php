<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('New Product') }}
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
            <button type="submit">Criar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
