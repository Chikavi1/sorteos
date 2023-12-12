@include('layouts.app')

<h2 class="text-center text-4xl font-bold text-green-900">Se han reservado los boletos</h2>
<h2 class="text-center text-xl mx-6">Ahora tienes que pagar y mandar una foto</h2>

<div class="flex mx-10 flex-col items-center justify-center mt-4 space-y-1 md:flex-row md:space-y-0 md:space-x-1">

    @if ($message = Session::get('success'))

    <a  href="{{ $message }}" class="text-center mx-4 w-full md:w-auto btn bg-green-900 px-4 py-2 text-white rounded-xl">Enviar WhatsApp</a>
    @endif

</div>
<div id="paymentmethods" class="mb-6" >
    <h2 style="color:#ff3c43" class="text-center  text-4xl font-bold my-12">Métodos de pago</h2>

    <div class="grid grid-cols-12">
      <div class="col-span-12 md:col-span-3 mx-4">
      <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
        <img
          alt="Office"
          src="https://sorteososorio.com/img/santander.png"
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
          src="https://sorteososorio.com/img/bbva.png"
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
