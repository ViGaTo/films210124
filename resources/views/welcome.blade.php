@extends('templates.principal')
@section('titulo')
    Inicio
@endsection
@section('cabecera')
    Películas del 2024
@endsection
@section('contenido')
    <div
        class="p-2 border-2 border-gray-500 shadow-xl rounded-xl w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach ($films as $item)
            <article style="background-image:url({{ Storage::url($item->imagen) }})" @class([
                'h-72 bg-cover bg-center bg-no-repeat',
                'md:col-span-2 lg:cols-span-2' => $loop->first,
            ])>
                <a href="{{route('films.show', $item)}}">
                    <div class="w-full h-full flex flex-col justify-around items-center p-2 bg-gray-200 bg-opacity-50">
                        <div class="text-xl font-bold text-black">
                            {{ $item->titulo }}
                        </div>
                        <div class="flex">
                            @foreach ($item->tags as $tag)
                                <div class="py-2 px-1 rounded-xl mr-1" style="background-color:{{ $tag->color }}">
                                    {{ $tag->nombre }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
    <div class="mt-2">
        {{ $films->links() }}
    </div>
@endsection
