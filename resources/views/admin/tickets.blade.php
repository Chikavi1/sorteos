@include('layouts.app-admin')

<h2 class="text-xl container font-bold text-center mt-8">Boleto vendidos del sorteo {{$sorteo->name}} <br> {{$sorteo->pricing}} pesos el boleto <br> {{$sorteo->tickets}} boletos</h2>

<div class="grid grid-cols-12 mt-8">
    <div class="col-span-12 my-4 md:col-span-2 md:col-start-4">
        <div class="bg-purple-500 text-white h-24 rounded-lg p-4 mx-4">
            <p class="font-bold">Porcentaje Vendido</p>
            <h2>{{$porcentaje}}%</h2>
        </div>
    </div>
    <div class="col-span-12 my-4 md:col-span-2">
        <div class="bg-black text-white h-24 rounded-lg p-4 mx-4">
            <p class="font-bold">Cantidad Vendidos</p>
            <h2>{{$cantidad}}</h2>
        </div>

    </div>
    <div class="col-span-12 my-4 md:col-span-2">
        <div class="bg-green-200 h-24 rounded-lg p-4 mx-4">
            <p class="font-bold">Total precio</p>
            <h2>${{$total_dinero}} MXN</h2>
        </div>
    </div>
</div>


<div class="container w-full px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            @if(count($tickets) != 0)
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">

                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                boleto
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Nombre
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Telefono
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Ciudad
                            </th>

                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Fecha
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Estatus
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $item)
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        #{{$item->folio}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">

                                        <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$item->name}}
                                                </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$item->cellphone}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$item->city}}
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$item->created_at}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">


                                    <form method="POST" action="{{ route('admin.changeStatusTicket') }}" >
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                                            @if($item->status == 0)
                                            <input type="hidden" name="type" value="1" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                                            <button type="submit">
                                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-red-200 rounded-full opacity-50">
                                                    </span>
                                                    <span class="relative">
                                                        Eliminado
                                                    </span>
                                                </span>
                                            </button>
                                            @elseif($item->status == 1)
                                            <input type="hidden" name="type" value="2" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                                            <button type="submit">
                                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-gray-500">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-gray-200 rounded-full opacity-50">
                                                    </span>
                                                    <span class="relative">
                                                        Pendiente
                                                    </span>
                                                </span>
                                            </button>
                                            @elseif($item->status == 2)
                                            <input type="hidden" name="type" value="0" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                                            <button type="submit">
                                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                                    </span>
                                                    <span class="relative">
                                                        Pagado
                                                    </span>
                                                </span>
                                            </button>
                                        @else



                                        @endif

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h2 class="text-center text-2xl text-red-900 font-bold">No hay ventas por el momento</h2>
            @endif
        </div>
    </div>
</div>
