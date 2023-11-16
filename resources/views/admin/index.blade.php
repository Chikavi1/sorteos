@include('layouts.app-admin')



<p class="text-right">
    <a href="/sos-sorteos/create" class="p-6 text-purple-900 font-bold">Crear Sorteo</a>
</p>
<div class="container w-full px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Sorteos
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Boletos
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Precios
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Fecha de creación
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Fecha de finalización
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Estatus
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($sorteos as $sorteo)
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                                <img alt="profil" src="{{ URL::asset('public/photos/'.$sorteo->photo) }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </div>
                                        <div class="ml-3">
                                            <a target="_blank" href="/sos/{{$sorteo->id}}" class="relative block">

                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$sorteo->name}}
                                                </p>

                                            </a>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$sorteo->tickets}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$sorteo->pricing}} MXN
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ date('d/M/y H:i a', strtotime($sorteo->created_at)) }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ date('d/M/y H:i a', strtotime($sorteo->end_date)) }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    @if($sorteo->status == 0)
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                        <span aria-hidden="true" class="absolute inset-0 bg-red-200 rounded-full opacity-50">
                                        </span>
                                        <span class="relative">
                                            Eliminado
                                        </span>
                                    </span>
                                    @elseif($sorteo->status == 1)
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-gray-900">
                                        <span aria-hidden="true" class="absolute inset-0 bg-gray-200 rounded-full opacity-50">
                                        </span>
                                        <span class="relative">
                                            Borrador
                                        </span>
                                    </span>
                                    @elseif($sorteo->status == 2)
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                        </span>
                                        <span class="relative">
                                            Activo
                                        </span>
                                    </span>
                                    @elseif($sorteo->status == 3)
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-white">
                                        <span aria-hidden="true" class="absolute inset-0 bg-black-700 rounded-full opacity-50">
                                        </span>
                                        <span class="relative">
                                            Finalizado
                                        </span>
                                    </span>
                                    @endif
                                </td>
                            </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
