<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Novo Produto') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="/products" method="post" class="w-full flex flex-col">
            @csrf
            <div class="w-xl flex items-center flex-col justify-center gap-4">
              <input class="rounded" type="text" name="name" placeholder="Nome do Produto">

              <select name="categoryId" class="rounded w-xl">
                <option value="selecione" selected disabled>Selecione a Categoria</option>

                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

              </select>
              <!-- <input class="rounded" type="text" name="categories" placeholder="Categoria do Produto"> -->
              <!-- <textarea name="description" cols="20" rows="5" class="w-sm rounded" placeholder="Digite uma descrição"></textarea> -->
            </div>

            <div class="flex items-center justify-center gap-4">
              <a href="{{route('products.index')}}" class="mt-2 px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300">Cancelar</a>
              <button type="submit" class="mt-2 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300">Criar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
