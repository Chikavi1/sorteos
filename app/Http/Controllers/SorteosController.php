<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sorteos;
use App\Models\Tickets;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use SEO;
use DB;
use Carbon\Carbon;

class SorteosController extends Controller
{
    public function index(){
        $sorteos = Sorteos::all();
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        return view('admin.index',compact('sorteos'));
      }

      public function landing(){
        $sorteo = Sorteos::where('status',2)->first();
        // dd($sorteo);
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        return view('welcome',compact('sorteo'));
      }

    public function book(Request $request){
        // dd($request->all());
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        $tickets = explode(",", $request->ntid);
        if($request->ntid != null){

        $amount = 0;
        $tnids = '';

        foreach ($tickets as &$value) {
            $amount += 1;
            $folio = str_pad($value, 4, "0", STR_PAD_LEFT);
            $tnids .=  $folio.',';

            // crear
            $ticket = new Tickets([
                'folio'             => $folio,
                'id_sorteo'         => $request->id_sorteo,
                'name'              => $request->get('name'),
                'city'              => $request->get('city'),
                'state'              => $request->get('state'),
                'cellphone'         => $request->get('cellphone'),
                'status'            => 1
            ]);
            $ticket->save();
        }

        $urllink = "https://api.whatsapp.com/send?phone=+523332707927&text=Sorteos+Osorio+%F0%9F%A4%91%0A%0AHola+soy+".$request->name."+de+".$request->city.",".$request->state."+y+mi+n%C3%BAmero+de+tel%C3%A9fono+es+".$request->cellphone."%0A%0A%E2%9A%A0%EF%B8%8F+FOLIOS+%E2%9A%A0%EF%B8%8F%0A%0ARESERV%C3%89+".$amount."+BOLETOS%3A+".$tnids."+%0A%0AM%C3%A1s+informaci%C3%B3n+de+las+cuentas+para+pago%3A%0Ahttps%3A%2F%2Fwww.sorteososorio.com%2Fmetodospago%0A%0AFavor+de+enviarnos+el+comprobante+de+dep%C3%B3sito%0A%0A%E2%9A%A0+PARA+TRANSFERENCIAS+PONER+%C3%9ANICAMENTE+TU+NOMBRE+EN+EL+CONCEPTO+%E2%9A%A0";
        return redirect('/success')->with('success', $urllink);
        }else{
            dd('error');
        }
    }

    public function login(Request $request){
        if($request->token === '199810'){
            session()->put('login', 'true');
            return redirect('/sos-admin');
        }else{
            return redirect('sos-admin')->with('error', 'Token incorrecto.');
        }
    }


    public function create(){
        return view('admin.create');
    }

    public function pagos(){
        return view('public.pagos');
    }


      public function show($id){
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        $sorteo = Sorteos::where('status',2)->first();
        $ticketsSelected = [];

        if($sorteo !=  null){

            $tickets = Tickets::where('id_sorteo',$sorteo->id)->where('status','!=',0)->pluck('folio');

            $tickets = DB::table('Tickets')->where('id_sorteo',$sorteo->id)->where(function ($query) {

                $query->where('status', '2');
                $query->orWhere(function ($subquery) {
                    $subquery->where('status', '1')
                        ->where('created_at', '>', Carbon::now()->subHours(16));
                });
            })->pluck('folio');

            foreach($tickets as  $value) {
                $str = ltrim($value, "0");
                array_push($ticketsSelected,$str);
            }
        }


        $tickets = json_encode($ticketsSelected,true);
        // dd($tickets);
        return view('public.show',compact('sorteo','tickets'));
      }

      public function privacy(){
        return view('public.privacy');
      }

      public function terms(){
        return view('public.terms');
      }
      public function verify(Request $request){
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        $data = [];
        $nofound = false;
        $sorteo = Sorteos::where('status',2)->first();
        if($request->isMethod('post')){
            if($sorteo){
                if(strlen($request->search) > 5){
                    $data = Tickets::where('cellphone',$request->search)->where('id_sorteo',$sorteo->id)->where(function ($query) {
                        $query->where('status', '2');
                        $query->orWhere(function ($subquery) {
                            $subquery->where('status', '1')
                                ->where('created_at', '>', Carbon::now()->subHours(16));
                        });
                    })->get();

                }else{
                   $data = Tickets::where('folio',$request->search)->where('id_sorteo',$sorteo->id)->where(function ($query) {
                    $query->where('status', '2');
                    $query->orWhere(function ($subquery) {
                        $subquery->where('status', '1')
                            ->where('created_at', '>', Carbon::now()->subHours(16));
                    });
                })->get();
                }

                if(count($data) == 0){
                    $data = [0];
                    $nofound = true;
                }
            }else{
                $data = [0];
                $nofound = true;
            }

        }

        return view('public.verify',compact('data','nofound'));
      }


      public function sorteo($id){
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        $sorteo = Sorteos::findOrFail($id);
        return view('admin.show',compact('sorteo'));
      }

      public function tickets($id){
        SEO::opengraph()->addImage(asset('img/caca.png'));
        SEO::twitter()->setImage(asset('img/caca.png'));
        $sorteo = Sorteos::findOrFail($id);

        // $tickets = Tickets::where('id_sorteo',$id)->get();

        $tickets = DB::table('Tickets')->where('id_sorteo',$sorteo->id)->where(function ($query) {

            $query->where('status', '2');
            $query->orWhere(function ($subquery) {
                $subquery->where('status', '1')
                    ->where('created_at', '>', Carbon::now()->subHours(16));
            });
        })->get();



        $cantidad = $tickets->where('status',2)->count();
        $total_dinero = $cantidad * $sorteo->pricing;
        $boletaje = $sorteo->tickets;
        $porcentaje = ($cantidad/$boletaje)*100;

        // dd($boletaje,$cantidad,$total_dinero,$porcentaje);
        return view('admin.tickets',compact('cantidad','total_dinero','porcentaje','tickets','sorteo'));
      }

      public function searchTickets(Request $request){
        $tickets = Tickets::where('id_sorteo',$id)->get();
        return view('admin.tickets',compact('tickets'));
      }

      public function faq()
      {
         return view('public.faq');
      }



    public function createTicket(){

    }
    public function store(Request $request)
    {
        $sorteo = new Sorteos([
            'name'              => $request->get('name'),
            'title'              => $request->get('title'),
            'cta'              => $request->get('cta'),
            'description'       => $request->get('description'),
            'tickets'           => $request->get('tickets'),
            'end_date'          => $request->get('end_date'),
            'pricing'           => $request->get('pricing'),
            'title'             => $request->get('title'),
            'cta'               => $request->get('cta'),
            'status'            => 1
        ]);

        // 0 eliminado
        // 1 borrador
        // 2 activo
        // 3 finalizado

        if($request->file('photo1')){
            $file= $request->file('photo1');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo = $filename;
        }

        if($request->file('photo2')){
            $file= $request->file('photo2');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo2 = $filename;
        }

        if($request->file('photo3')){
            $file= $request->file('photo3');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo3 = $filename;
        }

        if($request->file('photo4')){
            $file= $request->file('photo4');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo4 = $filename;
        }

        if($request->file('photo5')){
            $file= $request->file('photo5');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo5 = $filename;
        }

        $sorteo->save();
        return redirect('/sos-admin/');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    public function changeStatus(Request $request){
        $sorteo = Sorteos::findOrFail($request->id);
        if($request->type == 2){
            $sorteos = Sorteos::where('status',2)->update(['status' => 1]);
        }
        $sorteo->status = $request->type;
        $sorteo->update();
        return redirect('/sos-admin/');
    }

    public function changeStatusTicket(Request $request){
        $ticket = Tickets::findOrFail($request->id);
        $ticket->status = $request->type;
        $ticket->update();
        return redirect('/sos-tickets/'.$ticket->id_sorteo);
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $sorteo = Sorteos::findOrFail($request->id);
        $sorteo->name = $request->name;
        $sorteo->title = $request->title;
        $sorteo->cta = $request->cta;

        $sorteo->end_date = $request->end_date;
        $sorteo->description = $request->description;
        $sorteo->tickets = $request->tickets;
        $sorteo->pricing = $request->pricing;

        if($request->file('photo1')){
            $file= $request->file('photo1');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo = $filename;
        }

        if($request->file('photo2')){
            $file= $request->file('photo2');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo2 = $filename;
        }

        if($request->file('photo3')){
            $file= $request->file('photo3');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo3 = $filename;
        }

        if($request->file('photo4')){
            $file= $request->file('photo4');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo4 = $filename;
        }

        if($request->file('photo5')){
            $file= $request->file('photo5');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $sorteo->photo5 = $filename;
        }

        $sorteo->update();
        return redirect('/sos/'.$request->id);

    }
    public function success()
    {
        return view('public.success');
        //

    }

    public function destroy(string $id)
    {
        //
    }

    public function deletePhoto($id_sorteo,$id_photo){
        $sorteo = Sorteos::findOrFail($id_sorteo);
        if($id_photo == 2){
            $sorteo->photo2 = null;
        }
        if($id_photo == 3){
            $sorteo->photo3 = null;
        }
        if($id_photo == 4){
            $sorteo->photo4 = null;
        }
        if($id_photo == 5){
            $sorteo->photo5 = null;
        }

        $sorteo->update();
        return redirect('/sos/'.$sorteo->id);

    }
}
