@include('layouts.app')


  <section class="grid grid-cols-1 lg:grid-cols-2">
    <div class="w-full px-4 py-20 mx-auto bg-white xl:py-32 md:w-3/5 lg:w-4/5 xl:w-3/5">
      <h1 class="mb-4 -mt-3 text-2xl font-extrabold leading-snug tracking-tight text-left text-gray-900 md:text-4xl">Verifica tus boletos
    </h1>

      <form method="POST" action="{{ route('sorteos.verify') }}" class="mt-8 space-y-4">
        @csrf

        <label class="block">
          <span class="block mb-1 text-xs font-medium text-gray-700">Ingresa el número de boleto ó celular</span>
          <input type="text" id="name-with-label" class="mt-4 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="search" placeholder="Número de boleto ó celular"/>        </label>
          <input type="submit" minlength="4" class="w-full px-4 py-2 red-juan text-white" value="Buscar" />
    </form>
    </div>
    <div class="px-4 py-20  space-y-10 xl:py-32 md:px-40 lg:px-20 xl:px-40 -mt-20 md:-mt-12">

     @if(count($data) == 0)
        <div id="logo_company">
           <img src="https://i.ibb.co/QKg7y69/ad8c2d54-6722-463e-8f52-0c3c5036b386.jpg" alt="">
       </div>
    @else
   <div id="tickets" class="h-96  overflow-y-scroll overflow-y-hidden">
            @if($nofound == false)
            @foreach ($data as $item)
                <div class="relative  w-full p-4 my-4  bg-white shadow-lg rounded-2xl">
                    <div class="w-4/6">
                        <p class="mb-2 text-lg font-medium text-gray-800">
                        #{{$item->folio}}
                        </p>
                        <p class="text-xl text-gray-800">
                            {{$item->name}}
                        </p>
                        <p class="text-xs text-gray-400">
                           {{$item->city}}
                        </p>
                        <p class="text-xl font-medium text-indigo-500 mt-2">
                            @if($item->status == 2)
                            <li class="mb-3 flex items-center ">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                    </path>
                                </svg>
                                Pagado
                            </li>
                            @else
                            <li class="mb-3 flex items-center opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                    </path>
                                </svg>
                                Pendiente
                            </li>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
            @else
                <h2 class="text-center">No se encontró ningún resultado</h2>
            @endif
        </div>

    @endif



    </div>
  </section>

    <style>
    .red-juan{
        background: #fc0009;
        }
    </style>

@include('layouts.footer')
