@extends('templates.principal')
@section('titulo')
    Nueva Película
@endsection
@section('cabecera')
    Crear Película
@endsection
@section('contenido')
    <div class="w-3/4 mx-auto p-6 rounded-xl shadow-xl bg-gray-400 dark:text-gray-200">
        <form method="POST" action="{{route('films.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                <input type="text" id="titulo" value="{{old('titulo')}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Titulo..." name="titulo">
                    @error('titulo')
                    <x-error>{{$message}}</x-error>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <textarea id="descripcion" name="descripcion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descripción...">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    <x-error>{{$message}}</x-error>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etiquetas</label>
                <div class="flex">
                    @foreach($tags as $item)
                    <div class="flex items-center me-4">
                        <input id="{{$item->id}}" type="checkbox" value="{{$item->id}}" name="tags[]" @checked(in_array($item->id, old('tags', [])))
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="{{$item->id}}"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->nombre}}</label>
                    </div>
                    @endforeach
                </div>
                @error('tags')
                    <x-error>{{$message}}</x-error>
                    @enderror
            </div>
            <div class="mb-4">
                <div class="flex w-full">
                    <div class="w-1/2 mr-2">
                        <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen</label>
                        <input type="file" id="imagen" oninput="img.src=window.URL.createObjectURL(this.files[0])"
                            name="imagen" accept="image/*"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            @error('imagen')
                    <x-error>{{$message}}</x-error>
                    @enderror
                    </div>
                    <div class="w-1/2">
                        <img src="{{Storage::url('default.png')}}"
                            class="h-72 rounded w-full bg-cover bg-center bg-no-repeat border-4 border-black"
                            id="img">
                    </div>
                </div>

            </div>
            <div class="flex flex-row-reverse">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-save"></i> GUARDAR
                </button>
                <button type="reset" class="mx-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-paintbrush"></i> LIMPIAR
                </button>
                <a href="{{route('films.index')}}"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</a>
            </div>
        </form>
    </div>
    </div>
    </body>

    </html>
@endsection