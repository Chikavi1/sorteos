@include('layouts.app')


@if($sorteo)
<img class="w-full" src="{{ URL::asset('public/photos/'.$sorteo->photo) }}" alt="">
@endif

<section style="background: #fc0009;" class="py-8  bg-gradient dark:bg-gray-800 md:py-16">
    <div class="box-content max-w-5xl px-5 mx-auto">
        <div class="flex flex-col items-center -mx-5 md:flex-row">
            <div class="w-full px-5 mb-5 text-center md:mb-0 md:text-left">
                @if($sorteo)
                <h6 class="text-3xl font-semibold text-white uppercase md:text-2xl dark:text-gray-100">
                    Sorteo # {{$sorteo->id}}
                </h6>
                <h3 class="text-2xl font-bold text-white font-heading md:text-4xl">
                    {{ Carbon\Carbon::parse($sorteo->end_date)->formatLocalized('%d %B %Y ') }}
                </h3>
                <h3 class="text-lg font-bold leading-tight text-white font-heading md:text-xl">
                    {{ Carbon\Carbon::parse($sorteo->end_date)->formatLocalized('%I:%M %p') }}
                </h3>
                <div class="w-full mt-4 md:w-44">
                    <a href="/sorteos/1" class="py-2 px-4  bg-white hover:bg-gray-100 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-black  w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                       Comprar boleto
                    </a>
                </div>
                @endif
            </div>
            <div class="w-full px-5 md:w-auto">
                <div class="flex justify-center text-center text-white">
                    <div class="w-20 py-3 mx-2 border rounded-lg md:w-24 border-light-300 bg-light-100 md:py-4">
                        <div class="text-2xl font-semibold md:text-3xl">
                            <span id="days">
                            </span>
                        </div>
                        <div class="mt-3 text-xs uppercase opacity-75">
                            Dias
                        </div>
                    </div>
                    <div class="w-20 py-3 mx-2 border rounded-lg md:w-24 border-light-300 bg-light-100 md:py-4">
                        <div class="text-2xl font-semibold md:text-3xl">
                            <span id="hours">

                            </span>
                        </div>
                        <div class="mt-3 text-xs uppercase opacity-75 ">
                            Horas
                        </div>
                    </div>
                    <div class="w-20 py-3 mx-2 border rounded-lg md:w-24 border-light-300 bg-light-100 md:py-4">
                        <div class="text-2xl font-semibold md:text-3xl">
                            <span id="minutes">

                            </span>
                        </div>
                        <div class="mt-3 text-xs uppercase opacity-75 ">
                            Min
                        </div>
                    </div>
                    <div class="w-20 py-3 mx-2 border rounded-lg md:w-24 border-light-300 bg-light-100 md:py-4">
                        <div class="text-2xl font-semibold md:text-3xl">
                            <span id="seconds">

                            </span>
                        </div>
                        <div class="mt-3 text-xs uppercase opacity-75 ">
                            Seg
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
      <div>
        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider font-bold text-green-900 uppercase rounded-full bg-teal-accent-400">
         Como ganar
        </p>
      </div>
      <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
        Participa en 3 simples pasos
      </h2>
      <p class="text-base text-gray-700 md:text-lg">
        Descubre lo fácil que es poder participar en sorteos Osorio.
      </p>
    </div>
    <div class="grid gap-8 row-gap-5 md:row-gap-8 lg:grid-cols-3">
      <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2">
        <div class="flex items-center mb-2">
          <p class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-green-600 rounded-full bg-deep-purple-accent-400">
            1
          </p>
          <p class="text-lg font-bold leading-5">Escoge tu numero ganador</p>
        </div>
        <p class="text-sm text-gray-900">
            Elige un número de nuestra lista para apartarlo con tu nombre y teléfono.
        </p>
      </div>
      <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2">
        <div class="flex items-center mb-2">
          <p class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-green-600 rounded-full bg-deep-purple-accent-400">
            2
          </p>
          <p class="text-lg font-bold leading-5">Elige método de pago</p>
        </div>
        <p class="text-sm text-gray-900">
            Elige tu método de pago: depósito en banco, OXXO o transferencia bancaria.
        </p>
      </div>
      <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2">
        <div class="flex items-center mb-2">
          <p class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-green-600 rounded-full bg-deep-purple-accent-400">
            3
          </p>
          <p class="text-lg font-bold leading-5">Envia tu comprobante</p>
        </div>
        <p class="text-sm text-gray-900">
            Envíanos tu comprobante y recibe de inmediato tu boleto digital por whatsapp.
        </p>
        <p class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 -mt-4 -mr-4 font-bold rounded-full bg-deep-purple-accent-400 sm:-mt-5 sm:-mr-5 sm:w-10 sm:h-10">
          <svg class="text-white w-7" stroke="currentColor" viewBox="0 0 24 24">
            <polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,12 10,16 18,8"></polyline>
          </svg>
        </p>
      </div>
    </div>
  </div>

  <div class="text-center mb-10 ">
      <a class="px-6 py-4 red-juan text-white my-4 rounded-md" href="/sorteos/1">Comprar boleto</a>
  </div>


<div class="bg-black">
    <div class="lg:flex lg:items-center lg:justify-between w-full mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <h2 style="color:#ff3c43" class="text-xl   dark:text-white sm:text-2xl">
            <span class="block font-extrabold">
                IMPORTANTE
            </span>
            <span class="block text-white">
                SI YA APARTASTE TUS BOLETOS PUEDES ENVIAR TU <br> COMPROBANTE DE  PAGO AL SIGUIENTE WHATSAPP
            </span>
        </h2>
        <div class="lg:mt-0 lg:flex-shrink-0">
            <div class=" inline-flex rounded-md shadow">
                <button type="button" class="py-4 px-6  bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Enviar whatsapp
                </button>
            </div>
        </div>
    </div>
</div>

<div id="paymentmethods" class="mb-6" >
  <h2 style="color:#ff3c43" class="text-center  text-4xl font-bold my-12">Métodos de pago</h2>

  <div class="grid grid-cols-12">
    <div class="col-span-12 md:col-span-3 mx-4">
    <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
      <img
        alt="Office"
        src="{{asset('img/santander.png')}}"
        class="p-6 h-42"
      />

      <div class="bg-white p-4 sm:p-6">
        <time datetime="2022-10-10" class="block text-xs text-gray-500">
          Nombre
        </time>

        <a href="#">
          <h3 class="mt-0.5 text-lg text-gray-900">
            Juan Carlos Gaitan Osorio
          </h3>
        </a>
        <p  class="block text-xs text-gray-500 mt-6">
          Número de Tarjeta
        </p>

        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
          5579 0701 2746 5329
        </p>

        <p  class="block text-xs text-gray-500 mt-6">
          CLABE
        </p>

        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
          014320606225676826
        </p>
      </div>
    </article>
  </div>

  <div class="col-span-12 md:col-span-3 px-4">
    <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
      <img
        alt="Office"
        src="{{asset('img/bbva.png')}}"
        class="p-6 h-42"
      />

      <div class="bg-white p-4 sm:p-6">
        <time datetime="2022-10-10" class="block text-xs text-gray-500">
          Nombre
        </time>

        <a href="#">
          <h3 class="mt-0.5 text-lg text-gray-900">
            Juan Carlos Gaitan Osorio
          </h3>
        </a>
        <p  class="block text-xs text-gray-500 mt-6">
          Número de Tarjeta
        </p>

        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
          4152 3139 1800 1269
        </p>

        <p  class="block text-xs text-gray-500 mt-6">
          CLABE
        </p>

        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
          0123 2001 5341 437147
        </p>
      </div>
    </article>
  </div>
</div>

{{-- <h2>bancos</h2> --}}
</div>

<section class="relative pt-16 bg-blueGray-50">
    <div class="container mx-auto">
      <div class="flex flex-wrap md:items-center">
        <div class="w-12/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
          <div class="relative flex flex-col min-w-0  mb-6   bg-black">
            <img alt="..." src="https://www.gob.mx/cms/uploads/article/main_image/117717/Logo_lotenal2.jpg" class="w-full object-fit">
            <blockquote class="relative p-8 mb-4">

              <h4 class="text-xl font-bold text-white">
                GARANTÍA DE TRANSPARENCIA
              </h4>
              <p class="text-md font-light mt-2 text-white">
                El número GANADOR siempre es en base a los últimos 3, 4 o 5 dígitos de la LOTERÍA NACIONAL dependiendo la emisión, en caso de haber cambio de fecha de sorteo en el calendario de Lotería Nal. recorremos la rifa a la fecha de su siguiente sorteo (nunca utilizamos otra dinámica como tómbolas, bingo, etc.).
              </p>
            </blockquote>
          </div>
        </div>

        <div class="w-full md:w-6/12 px-4">
          <div class="flex flex-wrap">
            <div class="w-full md:w-6/12 px-4">
              <div class="relative flex flex-col mt-4">
                <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2">

                  <h6 class="text-xl mb-1 font-semibold text-green-700">1</h6>
                  <p class="mb-4 text-blueGray-500">
                    Publicamos la LISTA de todos los PARTICIPANTES de la RIFA en nuestra página de Facebook, antes de llevar a cabo el evento.
                  </p>
                </div>
              </div>
              <div class="relative flex flex-col min-w-0">
                <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2 mt-4">

                  <h6 class="text-xl mb-1 font-semibold text-green-700" >2
                  </h6>
                  <p class="mb-4 text-blueGray-500">
                    Transmitimos EN VIVO por Facebook la RIFA, al mismo tiempo que LOTERÍA NACIONAL, así como la entrega del premio al GANADOR.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 px-4">
              <div class="relative flex flex-col min-w-0 mt-4">
                <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2">

                  <h6 class="text-xl mb-1 font-semibold text-green-700">3</h6>
                  <p class="mb-4 text-blueGray-500">
                    IMPORTANTE: Fecha de Rifa del premio mayor sujeto al 80% o más de boletos vendidos.
                  </p>
                </div>
              </div>
              <div class="relative flex flex-col min-w-0">
                <div class="relative p-5 duration-300 transform bg-white border-2 rounded shadow-sm border-deep-purple-accent-700 hover:-translate-y-2 mt-4">

                  <h6 class="text-xl mb-1 font-semibold text-green-700">4</h6>
                  <p class="mb-4 text-blueGray-500">
                    En caso de que no se cumpla con el mínimo de venta se pospondría durante alguna semana o semanas más respetando los boletos emitidos, apartados y vendidos.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </section>

    {{-- acerca y contactanos --}}

    @extends('layouts.footer')
  <script>
      document.addEventListener('DOMContentLoaded', () => {

        //===
        // VARIABLES
        //===
        @if($sorteo)
        const DATE_TARGET = new Date('{{$sorteo->end_date}}');
        @endif
        // DOM for render
        const SPAN_DAYS = document.querySelector('span#days');
        const SPAN_HOURS = document.querySelector('span#hours');
        const SPAN_MINUTES = document.querySelector('span#minutes');
        const SPAN_SECONDS = document.querySelector('span#seconds');
        // Milliseconds for the calculations
        const MILLISECONDS_OF_A_SECOND = 1000;
        const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
        const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
        const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

        //===
        // FUNCTIONS
        //===

        /**
        * Method that updates the countdown and the sample
        */
        function updateCountdown() {
            // Calcs
            const NOW = new Date()
            const DURATION = DATE_TARGET - NOW;
            const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
            const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
            const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
            const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
            // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)

            // Render
            SPAN_DAYS.textContent = REMAINING_DAYS;
            SPAN_HOURS.textContent = REMAINING_HOURS;
            SPAN_MINUTES.textContent = REMAINING_MINUTES;
            SPAN_SECONDS.textContent = REMAINING_SECONDS;
        }

        //===
        // INIT
        //===
        updateCountdown();
        // Refresh every second
        setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
    });
    </script>
  </script>
