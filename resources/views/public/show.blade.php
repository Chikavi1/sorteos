@include('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" rel="stylesheet" />



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
@if($sorteo != null)

{{-- footer --}}
  <div class="grid grid-cols-12 gap-4 mx-3">

      <div class="col-span-12 md:col-span-5 md:col-start-2 md:mt-4">
              <ul
              class="bxslider overflow-hidden rounded-lg border border-gray-100 bg-white shadow-sm">
                  @if($sorteo->photo)
                      <li>
                          <img
                          alt="Office"
                          src="{{ URL::asset('public/photos/'.$sorteo->photo) }}"
                          class="h-72 w-full object-cover"/>
                      </li>
                  @endif
                  @if($sorteo->photo2)
                      <li>
                          <img
                          alt="Office"
                          src="{{ URL::asset('public/photos/'.$sorteo->photo2) }}"
                          class="h-72 w-full object-cover"/>
                      </li>
                  @endif

                  @if($sorteo->photo3)
                      <li>
                          <img
                          alt="Office"
                          src="{{ URL::asset('public/photos/'.$sorteo->photo3) }}"
                          class="h-72 w-full object-cover"/>
                      </li>
                  @endif

                  @if($sorteo->photo4)
                      <li>
                          <img
                          alt="Office"
                          src="{{ URL::asset('public/photos/'.$sorteo->photo4) }}"
                          class="h-72 w-full object-cover"/>
                      </li>
                  @endif

                  @if($sorteo->photo5)
                      <li>
                          <img
                          alt="Office"
                          src="{{ URL::asset('public/photos/'.$sorteo->photo5) }}"
                          class="h-72 w-full object-cover"/>
                      </li>
                  @endif
              </ul>
      </div>


      <div  class="col-span-12 md:col-span-5">
          <div class="p-4 sm:p-6">
              <h2 class="text-xl md:text-2xl my-4" style="color:orange">¡Super promoción!</h2>
              <a href="#">
              <h3 class="text-lg font-medium text-gray-900">
                  {{$sorteo->title}}
              </h3>
              </a>

              <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                  {{$sorteo->description}}
              </p>

              <h1 class="font-bold text-2xl mt-2 md:text-4xl text-green-600">¡¡Boleto a solo {{$sorteo->pricing}} pesos!!</h1>
          </div>
      </div>

  </div>

  <div>
  <h2 class="text-center my-12 font-bold text-2xl md:text-4xl">Haz clic para seleccionar un número</h2>
  </div>


  <div class="grid grid-cols-12"  id="inputrandom">
      <div class="col-span-4 col-start-5">
          <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected>Seleccionar aleatorio</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>
          <p onclick="random()" class="text-center bg-black px-4 py-2 text-white">Seleccionar</p>

      </div>
  </div>

  <h3 id="resetbtn" onClick="resetCount()" class="text-center mt-2 text-red-900 font-bold hidden">Reiniciar selección</h3>



  <div class="grid grid-cols-12 md:mx-40  mt-4">
      @for ($i = 1; $i <= $sorteo->tickets; $i++)
        <div class=" col-span-3 md:col-span-1 " onClick="selectTicket({{$i}})">
            <div id="ticket-{{$i}}" class=" m-1 font-medium py-1 px-2 rounded-full border border-gray-300 ">
                <div  class="text-xs font-normal text-center leading-none  flex-initial" >
                    {{ str_pad($i, 4, "0", STR_PAD_LEFT) }}
                    </div>
            </div>
        </div>
      @endfor
  </div>

  <section  class="flex items-center justify-center bg-white">
          <div id="modalOverlay" style="display:none;">
              <div id="modal" class="rounded-2xl max-w-xl">
                  <div class="flex py-2 w-full items-center justify-center border-b">
                          <h1 class="pt-4 text-xl text-black font-semibold text-center pb-4">Ingresa tus datos</h1>
                          <button id="close" class="m-4 absolute top-0 right-1 hover:bg-gray-200 rounded-full p-1 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-black" type="button">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                          </button>
                  </div>
                  <div class="p-12">
                      <form method="POST" action="{{ route('sorteos.book') }}">
                          @csrf
                          <div class="bg-white  rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
                              <div class="px-4 py-8 sm:px-10">

                                  <div class="mt-6">
                                      <div class="w-full space-y-6">
                                          <div class="w-full">
                                              <div class=" relative ">
                                                  <input required name="name" type="text" id="search-form-price" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Nombre"/>
                                                  </div>
                                              </div>
                                              <div class="w-full">
                                                  <div class=" relative ">
                                                      <input required  name="cellphone" type="text" id="search-form-location" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Whatsapp"/>
                                                      </div>
                                                  </div>
                                                  <div class="w-full">
                                                      <div class=" relative ">
                                                          <input required name="city" type="text" id="search-form-name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Ciudad"/>
                                                          </div>
                                                      </div>
                                                      <input type="hidden" id="nt-id" name="ntid">
                                                      <input type="hidden" id="id_sorteo" name="id_sorteo" value="{{$sorteo->id}}">

                                                      <div>
                                                          <span class="block w-full rounded-md shadow-sm">
                                                              <button type="form" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                                  Reservar
                                                              </button>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <p class="my-3 text-green-600 text-center font-bold">Total $ <span id="nt-total"></span>  MXN</p>
                                          <div class="px-4 py-6 border-t-2 border-gray-200  sm:px-10">
                                              <p class="text-xs leading-5 text-gray-500">
                                                  Tu información no se comparte con nadie.
                                              </p>
                                          </div>
                                  </div>

                              </div>
                      </form>
              </div>
          </div>
  </section>


  <div class="fixed inset-x-0 bottom-0">
      <div class="red-juan px-4 py-3 text-white text-center">
      <p class="text-center text-sm font-medium">
          Pulsa en el boleto seleccionado para eliminarlo
      </p>
      <p id="parrays" class="text-center inline-block text-no">
      </p>
      <p  onClick="openModal()"  class="text-center mt-4 bg-white rounded-lg py-2">
          <span  class="text-red-juan" >
              Continuar
          </span>
      </p>
  </div>
  </div>


  <script>
    $(document).ready(function(){
        $('.bxslider').bxSlider();
        var arraySelected = [];
    });


    var arrayApiSelected =  {!! $tickets !!}
    var arraySelected = [];

    function zeroPad(num, places) {
    var zero = places - num.toString().length + 1;
    return Array(+(zero > 0 && zero)).join("0") + num;
    }

    @if($sorteo)
        const numbers = Array({{$sorteo->tickets}}).fill(1).map((n, i) => n + i)
    @endif
    const NUMBERS_LENGTH = numbers.length
    let randomNumbers = []

    function createRandom(numberselect){
    randomNumbers = []
    // agregando aleatorios a randomNumbers
    while(randomNumbers.length < numberselect) {
        const randomIndex = getRandom()
        if (!checkNotRepeat(numbers[randomIndex], randomNumbers))
        selectTicket(randomIndex)
            randomNumbers.push(numbers[randomIndex])
        }
    }


    // Obteniendo aleatorios en rango
    function getRandom() {
    return Math.floor(Math.random() * NUMBERS_LENGTH)
    }
    // checkeando por no repetidos
    function checkNotRepeat(current, validNumbers) {
    return validNumbers.includes(current)
    }


    function initTickets(){
        arrayApiSelected.forEach( function(value) {
            $("#ticket-"+value).addClass('red-juan text-red-juan');
        });
        @if($sorteo)
        const Totalnumbers = Array({{$sorteo->tickets}}).fill(1).map((n, i) => n + i)
        var restantes = Totalnumbers.filter(el => !arrayApiSelected.includes(el));
    @endif
    }

    function random(){
        if($("#inputrandom").find(":checked").val() == "Seleccionar aleatorio"){
            alert('Ingresa un número primero');
        }else{
            createRandom($("#inputrandom").find(":checked").val());
                $('#inputrandom').addClass('hidden');
                $('#resetbtn').removeClass('hidden');
        }
    }

    initTickets()


    function selectTicket(id){

        var afterselectuser = arrayApiSelected.indexOf(id);
        if (afterselectuser !== -1) {
            return;
        }

        var index = arraySelected.indexOf(id);
            if (index !== -1) {
                deleteTicket(id);
            }else{
            if(arraySelected.length < 5){
                arraySelected.push(id);
                $("#ticket-"+id).addClass('red-juan text-red-juan');
                $( "#parrays" ).append( "<span id='text-"+id+"' onclick='deleteTicket("+id+")'>#"+ zeroPad(id, 4)+" </span>" );
            }
    }
    }

    function resetCount(){


        var caca = [];
        caca = arraySelected;

        caca.forEach(element => {
            console.log(element);
            $("#ticket-"+element).removeClass('red-juan text-red-juan');
            $( "#text-"+element).remove();
        });

        arraySelected = [];

        $("#inputrandom").removeClass('hidden');

    }

    function deleteTicket(id){
        var index = arraySelected.indexOf(id);
        console.log(id)
        if (index !== -1) {
            arraySelected.splice(index, 1);
            $("#ticket-"+id).removeClass('red-juan text-red-juan');
            $( "#text-"+id).remove();
        }
    }

    function openModal(){
        total = arraySelected.length*{{$sorteo->pricing}};
        $("#nt-total").text(total);

        if(arraySelected.length == 0){
            alert('Necesitas seleccionar un boleto primero');
            return;
        }

     $('#modalOverlay').show().addClass('modal-open');
        $('#nt-id').val( arraySelected );
    }

    $('#close').click(function() {
        var modal = $('#modalOverlay');
        modal.removeClass('modal-open');
        setTimeout(function() {
            modal.hide();
        },200);
    });
</script>


@else

    <h2 class="text-center text-3xl px-6 py-12">Gracias por elegirnos estamos  creando un nuevo sorteo para ti</h2>
    <p  class="text-center text-xl px-6">Quedate al pendiente en nuestras redes sociales</p>


    <p class="mt-8 mb-4 space-y-2 text-sm text-left text-gray-600 sm:text-center sm:space-y-0">
        <a href="#" class="w-full btn btn-sm btn-link sm:w-auto">
            Facebook
        </a>
        <a href="#" class="w-full btn btn-sm btn-link sm:w-auto">Instagram</a>
      </p>

@endif



<div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
  <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
    <div class="sm:col-span-2">
      <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
       <img class="w-12 h-12" src="https://i.ibb.co/QKg7y69/ad8c2d54-6722-463e-8f52-0c3c5036b386.jpg" alt="">
        <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Sorteos Osorio</span>
      </a>
      <div class="mt-6 lg:max-w-sm">
        <p class="text-sm text-gray-800">
          Empresa 100% mexicana.
              </p>
        <p class="mt-4 text-sm text-gray-800">
          Ayudamos a las personas a cumplir su sueño!
      </p>
      </div>
    </div>
    <div class="space-y-2 text-sm">
      <p class="text-base font-bold tracking-wide text-gray-900">Contacto</p>
      <div class="flex">
        <p class="mr-1 text-gray-800">Celular:</p>
        <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">3332707927</a>
      </div>
      <div class="flex">
        <p class="mr-1 text-gray-800">Correo:</p>
        <a href="mailto:sorteososorio@gmail.com" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">sorteosorio@gmail.com</a>
      </div>
      <div class="flex">
        <p class="mr-1 text-gray-800">Dirección:</p>
        <a href="https://www.google.com/maps"  rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
          Guadalajara, Jalisco, México.
        </a>
      </div>
    </div>
    <div>
      <span class="text-base font-bold tracking-wide text-gray-900">Redes Sociales</span>
      <div class="flex items-center mt-1 space-x-3">

        <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
          <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
            <circle cx="15" cy="15" r="4"></circle>
            <path
              d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
            ></path>
          </svg>
        </a>
        <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
          <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
            <path
              d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
            ></path>
          </svg>
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-500">
        Siguenos para no perderte de nuestros sorteos y regalos a nuestros seguidores
      </p>
    </div>
  </div>
  <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
    <p class="text-sm text-gray-600">
      2023 Sorteos Osorio
    </p>
    <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
      <li>
        <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">FAQ</a>
      </li>
      <li>
        <a href="/privacy" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Politica de privacidad</a>
      </li>
      <li>
        <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Terminos &amp; condiciones</a>
      </li>
    </ul>
  </div>
</div>




<style>
    #modalOverlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.4);
    z-index:9999;
    }


    .text-no {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
    }

    #modal {
    position: fixed;
    width: 90%;
    top: 55%;
    left: 50%;
    text-align: center;
    background-color: #fafafa;
    box-sizing: border-box;
    opacity: 0;
    transform: translate(-50%,-50%);
    transition: all 300ms ease-in-out;
    }
    .red-juan{
    background: #fc0009;
    }

    .text-red-juan{
        color: #fc0009;
    }

    #modalOverlay.modal-open #modal {
    opacity: 1;
    top: 50%;
    }
</style>
