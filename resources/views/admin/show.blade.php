@include('layouts.app-admin')


<section class="h-screen bg-gray-100/50 mt-4">
    @if($sorteo->status != 0)
        <div  class="container max-w-2xl mx-auto shadow-md md:w-3/4">
            <div class="grid grid-cols-12 my-4">
                @if($sorteo->status == 1)
                <div class="col-span-3 col-start-6 md:col-start-9 md:col-span-2">
                    <form method="POST" action="{{ route('admin.changeStatus') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$sorteo->id}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <input type="hidden" name="type" value="0" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <button class="bg-red-700 text-white px-4 py-2 rounded-lg" type="submit">Eliminar</button>
                    </form>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <form method="POST" action="{{ route('admin.changeStatus') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$sorteo->id}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <input type="hidden" name="type" value="2" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <button class="bg-green-700 text-white px-4 py-2 rounded-lg" type="submit">Publicar</button>
                    </form>
                </div>
                @elseif($sorteo->status == 2)
                <div class="col-span-1 col-start-10">
                    <form method="POST" action="{{ route('admin.changeStatus') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$sorteo->id}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <input type="hidden" name="type" value="0" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                        <button class="bg-black text-white rounded-lg px-4 py-2" type="submit">Finalizar</button>
                    </form>
                </div>
                @endif
            </div>

            <form  method="POST" action="{{ route('admin.update') }}"   enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 border-t-2 border-indigo-400 rounded-lg bg-gray-100/5 ">
                    <img  id="pic1" alt="profile"  src="{{ URL::asset('public/photos/'.$sorteo->photo) }}"  class="mx-auto object-cover  w-full "/>
                    <input class="mx-auto" type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" value="{{$sorteo->photo}}" oninput="pic1.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo1">
                    <p class="text-center">Clic para cambiar foto</p>
                </div>
                <div class="grid grid-cols-12">
                    <div class="col-span-5 col-start-2">
                        <img id="pic2" style="max-height:13em;min-height:13em;object-fit: cover;" src="{{ $sorteo->photo2?URL::asset('public/photos/'.$sorteo->photo2):'https://www.shutterstock.com/image-vector/default-image-icon-vector-missing-600nw-2079504220.jpg' }}" alt="imagen 2">

                    </div>
                    <div class="col-span-6 text-center">
                        <h1>Imagen 2</h1>
                        <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" value="{{$sorteo->photo2}}" oninput="pic2.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo2">
                        @if($sorteo->photo2)
                        <a style="color:red;" href="/sos-deletep/{{$sorteo->id}}/2">Eliminar foto</a>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-12 mt-2">
                    <div class="col-span-5 col-start-2">
                        <img id="pic3" src="{{ $sorteo->photo3?URL::asset('public/photos/'.$sorteo->photo3):'https://www.shutterstock.com/image-vector/default-image-icon-vector-missing-600nw-2079504220.jpg' }}" alt="photo 3">
                    </div>
                    <div class="col-span-6 text-center">
                        <h1>Imagen 3</h1>
                        <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" value="{{$sorteo->photo3}}" oninput="pic3.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo3">
                        @if($sorteo->photo3)
                        <a style="color:red;" href="/sos-deletep/{{$sorteo->id}}/3">Eliminar foto</a>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-12 mt-2">
                    <div class="col-span-5 col-start-2">
                        <img id="pic4" src="{{ $sorteo->photo4?URL::asset('public/photos/'.$sorteo->photo4):'https://www.shutterstock.com/image-vector/default-image-icon-vector-missing-600nw-2079504220.jpg' }}" alt="photo4">
                    </div>
                    <div class="col-span-6 text-center">
                        <h1>Imagen 4</h1>
                        <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" value="{{$sorteo->photo4}}" oninput="pic4.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo4">
                        @if($sorteo->photo4)
                        <a style="color:red;" href="/sos-deletep/{{$sorteo->id}}/4">Eliminar foto</a>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-12 mt-2">
                    <div class="col-span-5 col-start-2">
                        <img id="pic5" src="{{ $sorteo->photo5?URL::asset('public/photos/'.$sorteo->photo5):'https://www.shutterstock.com/image-vector/default-image-icon-vector-missing-600nw-2079504220.jpg' }}" alt="photo 5">
                    </div>
                    <div class="col-span-6 text-center">
                        <h1>Imagen 5</h1>
                        <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" value="{{$sorteo->photo5}}" oninput="pic5.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo5">
                        @if($sorteo->photo5)
                        <a style="color:red;" href="/sos-deletep/{{$sorteo->id}}/5">Eliminar foto</a>
                        @endif
                    </div>
                </div>

                <div class="space-y-6 bg-white">
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Nombre
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input
                                name="name" type="text" id="user-info-email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                value="{{$sorteo->name}}"
                                placeholder="Nombre del premio"/>
                                </div>
                            </div>
                    </div>


                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Titulo
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input
                                name="title" type="text" id="user-info-email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                value="{{$sorteo->title}}"
                                placeholder="Titulo del premio"/>
                                </div>
                            </div>
                    </div>


                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            CTA
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input
                                name="cta" type="text" id="user-info-email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                value="{{$sorteo->cta}}"
                                placeholder="CTA del premio"/>
                                </div>
                            </div>
                    </div>

                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Fecha de finalización
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input
                                name="end_date"
                                value="{{$sorteo->end_date}}"
                                type="datetime-local"  class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Fecha de finalización"/>
                                </div>
                            </div>
                        </div>

                        <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                            <h2 class="max-w-sm mx-auto md:w-1/3">
                                Descripción
                            </h2>
                            <div class="max-w-sm mx-auto md:w-2/3">
                                <div class=" relative ">
                                    <textarea name="description" type="text" id="user-info-email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Descripción del premio">{{$sorteo->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                        <hr/>
                        <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                            <h2 class="max-w-sm mx-auto md:w-1/3">
                            Boletaje
                            </h2>
                            <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                                <div>
                                    <div class=" relative ">
                                        <input type="text" id="user-info-name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="tickets"
                                        value="{{$sorteo->tickets}}"
                                        placeholder="Cantidad de boletos"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class=" relative ">
                                            <input type="text" id="user-info-phone" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            name="pricing"
                                            value="{{$sorteo->pricing}}"
                                            placeholder="Costo del boleto"/>
                                            </div>
                                        </div>
                                        <div class=" relative ">
                                            <input type="phone" id="user-info-phone" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            name="limit_tickets"
                                            value="{{$sorteo->limit_tickets}}"
                                            placeholder="Limite de boletos por persona"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                                        <a href="/sos-tickets/{{$sorteo->id}}" type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                            Ver ventas
                                        </a>
                                    </div>
                                </div>
                                <hr/>
                                <div class="items-center w-full p-8 space-y-4 text-gray-500 md:inline-flex md:space-y-0">




                                    <div class="w-full max-w-sm pl-2 mx-auto space-y-5 md:w-5/12 md:pl-9 md:inline-flex">
                                        <div class=" relative ">
                                            <input type="hidden" name="id" value="{{$sorteo->id}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="ingresa contraseña para eliminar"/>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                                        <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
            </form>
        </div>
    @else
        <h2 class="text-center font-bold my-20 text-3xl">Sorteo Eliminado</h2>
    @endif

</section>
