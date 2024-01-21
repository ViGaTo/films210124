@extends('templates.principal')
@section('titulo')
    Detalle de Película
@endsection
@section('cabecera')
    Detalle de la película
@endsection
@section('contenido')
    <div class="w-1/2 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg bg-center bg-no-repeat bg-cover w-full" src="{{ Storage::url($film->imagen) }}"
            alt="{{ $film->titulo }}" />
        <div class="p-5">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $film->titulo }}</h5>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $film->descripcion }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <span class="font-bold">Fecha de creación: </span>{{ $film->created_at->format('d/m/Y H:i:s') }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <span class="font-bold">Fecha de última modificación: </span>{{ $film->updated_at->format('d/m/Y H:i:s') }}
            </p>
            <div class="flex mb-2">
                @foreach ($film->tags as $item)
                    <div class="py-2 px-1 rounded-xl mr-1" style="background-color:{{ $item->color }}">
                        {{ $item->nombre }}
                    </div>
                @endforeach
            </div>
            <a href="#" onclick="location.href = document.referrer; return false"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                VOLVER
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
@endsection
