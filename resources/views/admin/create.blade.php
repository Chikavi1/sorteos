@include('layouts.app-admin')


<section class="h-screen bg-gray-100/50 mt-4">
    <form method="POST" action="{{ route('admin.store') }}" class="container max-w-2xl mx-auto shadow-md md:w-3/4" enctype="multipart/form-data">
        @csrf
        <div class="p-4 border-t-2 border-indigo-400 rounded-lg bg-gray-100/5 ">
            <img   id="pic1" alt="profile" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_3p9evAhymXu6TcGxMCsOUZUE6wc1E-RxvCDUIN1BQ&s" class="mx-auto object-cover  w-full "/>
            <h1 class="text-center font-bold">Imagen principal</h1>
            <input class="mx-auto" type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" oninput="pic1.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo1">
            <p class="text-center">Clic para cambiar foto</p>
        </div>
        <div class="grid grid-cols-12">
            <div class="col-span-3 col-start-2">
                <img id="pic2" style="max-height:13em;min-height:13em;object-fit: cover;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_3p9evAhymXu6TcGxMCsOUZUE6wc1E-RxvCDUIN1BQ&s" alt="imagen 2">
            </div>
            <div class="col-span-6 text-center">
                <h1>Imagen 2</h1>
                <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp"  oninput="pic2.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo2">
                <p>Haz clic para cambiarla</p>
            </div>
        </div>

        <div class="grid grid-cols-12 mt-2">
            <div class="col-span-3 col-start-2">
                <img id="pic3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_3p9evAhymXu6TcGxMCsOUZUE6wc1E-RxvCDUIN1BQ&s" alt="photo 3">
            </div>
            <div class="col-span-6 text-center">
                <h1>Imagen 3</h1>
                <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" oninput="pic3.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo3">
                <p>Haz clic para cambiarla</p>
            </div>
        </div>

        <div class="grid grid-cols-12 mt-2">
            <div class="col-span-3 col-start-2">
                <img id="pic4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_3p9evAhymXu6TcGxMCsOUZUE6wc1E-RxvCDUIN1BQ&s" alt="photo4">
            </div>
            <div class="col-span-6 text-center">
                <h1>Imagen 4</h1>
                <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp"  oninput="pic4.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo4">
                <p>Haz clic para cambiarla</p>
            </div>
        </div>

        <div class="grid grid-cols-12 mt-2">
            <div class="col-span-3 col-start-2">
                <img id="pic5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_3p9evAhymXu6TcGxMCsOUZUE6wc1E-RxvCDUIN1BQ&s" alt="photo 5">
            </div>
            <div class="col-span-6 text-center">
                <h1>Imagen 5</h1>
                <input type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp"  oninput="pic5.src=window.URL.createObjectURL(this.files[0])"  placeholder="Ingresa imagen" name="photo5">
                <p>Haz clic para cambiarla</p>
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
                        name="name"
                        type="text"  class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="Nombre del sorteo"/>
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
                            <textarea type="text"  name="description"
                             class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Descripción del premio"></textarea>
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
                                <input  type="number" name="tickets"    class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Cantidad de boletos"/>
                                </div>
                            </div>
                            <div>
                                <div class=" relative ">
                                    <input type="number" name="pricing" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Costo del boleto"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr/>
                        <div class="items-center w-full p-8 space-y-4 text-gray-500 md:inline-flex md:space-y-0">

                            <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                                <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
