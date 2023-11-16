<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- {!! SEO::generate() !!} --}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
        rel="stylesheet"
      />
      {!! SEO::generate() !!}
    </head>

    <body>

{{--
    <div
    class="bg-red-500 px-4 py-3 text-white sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">


          <p class="text-center font-medium sm:text-left">
         PROXIMO SORTEO: Viernes, 15 de septiembre del 2023
          </p>

          <a
              class="mt-4 block rounded-lg bg-white px-5 py-3 text-center text-sm font-medium text-green-600 transition hover:bg-white/90 focus:outline-none focus:ring active:text-indigo-500 sm:mt-0"
              href="/sorteos/1">
              Comprar boletos
          </a>

  </div> --}}

  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap  flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">

      </nav>
      <a href="/"  class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
        <img class="w-32 h-32" src="https://i.ibb.co/h8NNwF1/ad8c2d54-6722-463e-8f52-0c3c5036b386-removebg-preview.png" alt="">

      </a>
      <div class="lg:w-2/5 inline-flex lg:justify-end md:ml-5 lg:ml-0 mb-4 -mt-6">
        <a href="/verify" class="text-black px-4 py-2 rounded-xl red-juan text-white" >Verifica tu boleto</a>
        <a href="/sorteos/1" class="ml-2 hover:text-gray-900 red-juan px-4 py-2 rounded-xl text-white">Comprar Boletos</a>
      </div>
    </div>
  </header>

    </body>

</html>
<style>
      .red-juan{
        background: #fc0009;
        }
</style>
