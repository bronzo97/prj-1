<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Modelc;
use App\Models\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;


class CarController extends Controller
{


    public function inseriscicolore()
    {
        $colore = new Color;
        $colore->id = 0;
        $colore->color = "";

        $titolo = "Inserisci un nuovo colore";

        return view('colore', compact('colore', 'titolo'));
    }
    

    public function storecolore(Request $request)
    {

        $this->validate($request, ['colore' => 'required|unique:colors,color'],
        [
            'colore.required' => 'Ricordati di inserire il colore',
            'colore.unique' => 'Specifica un colore inesistente'
        ]);

        if($request->id > 0)
        {
            // modifica
            $color = Color::find($request->id);
        }
        else
        {
            $color = new Color;
        }
        $color->color = $request->colore;
        $color->save();

        return $this->listacolori();
    }

    public function listacolori()
    {
        $colori = Color::orderBy('color')->get();

        return view('colori', compact('colori'));
        
    }

    public function modificacolore($idcolore)
    {
        
        $colore = Color::find($idcolore);

        $titolo = "Modifica il colore " . $colore->color;

        return view('colore', compact('colore', 'titolo'));
    }
    
    public function cancellacolore($idcolore)
    {
        
        
        Color::find($idcolore)->delete();

        return $this->listacolori();
    }

    public function inseriscimarchio()
    {
        $marchio = new Brand;
        $marchio->id = 0;
        $marchio->brand = "";

        $titolo = "Inserisci un nuovo marchio";

        return view('marchio', compact('marchio', 'titolo'));
    }
    

    public function storemarchio(Request $request)
    {

        $this->validate($request, ['marchio' => 'required|unique:brands,brand'],
        [
            'marchio.required' => 'Ricordati di inserire il marchio',
            'marchio.unique' => 'Specifica un marchio inesistente'
        ]);

        if($request->id > 0)
        {
            // modifica
            $brand = Brand::find($request->id);
        }
        else
        {
            $brand = new Brand;
        }
        $brand->brand = $request->marchio;
        $brand->save();

        return $this->listamarchi(0);
    }

    public function listamarchi($errore = 0)
    {
        $marchi = Brand::orderBy('brand')->get();

        return view('marchi', compact('marchi', 'errore'));
        
    }

    public function modificamarchio($idmarchio)
    {
        
        $marchio = Brand::find($idmarchio);

        $titolo = "Modifica il marchio " . $marchio->brand;

        return view('marchio', compact('marchio', 'titolo'));
    }
    
    public function cancellamarchio($idmarchio)
    {
        $errore = 0;
        try{
            Brand::find($idmarchio)->delete();
        }
        catch(QueryException $e) {
            $errore = 1;
        }
        

        return $this->listamarchi($errore);
    }

    public function listamodelli()
    {

        $modelli = DB::table('models')
        ->leftjoin('brands', 'models.brand_id', '=', 'brands.id')
        ->select('models.*', 'brands.brand')
        ->orderBy('model')
        ->get();
        /*
        $istruzione = 'select m.id, m.brand_id, m.model, b.brand ' . 
        'from models m left join brands b on m.brand_id = b.id order by m.model;';
        
        $modelli = DB::select($istruzione);
        */
        //dd($modelli);

        return view('modelli', compact('modelli'));
        
    }
    
    public function inseriscimodello()
    {
        $modello = new Modelc;
        $modello->id = 0;
        $modello->brand_id = 0;
        $modello->model = "";

        $marchi = Brand::orderBy('brand')->get();

        $titolo = "Inserisci un nuovo modello";

        return view('modello', compact('modello', 'titolo', 'marchi'));
    }
        

    public function storemodello(Request $request)
    {

        $this->validate($request, ['modello' => 'required|unique:models,model'],
        [
            'modello.required' => 'Ricordati di inserire il modello',
            'modello.unique' => 'Specifica un modello inesistente'
        ]);

        if($request->id > 0)
        {
            // modifica
            $modello = Modelc::find($request->id);
        }
        else
        {
            $modello = new Modelc;
        }
        $modello->model = $request->modello;
        $modello->brand_id = $request->marchioid;
        $modello->save();

        return $this->listamodelli();
    }

    
    public function modificamodello($idmodello)
    {
        
        $modello = Modelc::find($idmodello);
        
        $marchi = Brand::orderBy('brand')->get();

        $titolo = "Modifica il modello " . $modello->model;

        return view('modello', compact('modello', 'titolo', 'marchi'));
    }
        
    public function cancellamodello($idmodello)
    {
        
        Modelc::find($idmodello)->delete();

        return $this->listamodelli();
    }


////////////////////
// CAR CONTROLLER //
////////////////////

public function listaautomobili()
{
    /*
    $automobili = DB::table('cars')
    ->leftjoin('brands', 'models.brand_id', '=', 'brands.id')
    ->select('models.*', 'brands.brand')
    ->orderBy('model')
    ->get();
    */
    /*
    $istruzione = 'select m.id, m.brand_id, m.model, b.brand ' . 
    'from models m left join brands b on m.brand_id = b.id order by m.model;';
    
    Query per selezionare il brand_id, color_id e il model_id

    SELECT 'targa', 'brands.id', 'colors.id', 'models.id'
        FROM `cars`
        LEFT JOIN brands
        ON 'brands.id' = 'cars.brand_id'
        LEFT JOIN colors
        ON 'colors.id' = 'cars.color_id'
        LEFT JOIN models
        ON 'models.id' = 'cars.moel_id';
    */
    $istruzione = 'SELECT targa, brands.id, colors.id, models.id, models.model, brands.brand, colors.color
        FROM cars
        LEFT JOIN brands
        ON brands.id = cars.brand_id
        LEFT JOIN colors
        ON colors.id = cars.color_id
        LEFT JOIN models
        ON models.id = cars.model_id;';

    $automobili = DB::select($istruzione);
    
    //dd($modelli);

    return view('automobili', compact('automobili'));
    
}

public function inserisciautomobile()
{
    $automobile = new Car;
    
    $automobile->color_id = 0;
    $automobile->brand_id = 0;
    $automobile->model_id = 0;
    //$automobile->targa;
    

    $marchi = Brand::orderBy('brand')->get();
    $modelli = DB::table('models')
    ->leftjoin('brands', 'models.brand_id', '=', 'brands.id')
    ->select('models.*', 'brands.brand')
    ->orderBy('brand', 'asc')
    ->orderBy('model', 'asc')
    ->get();
    $colori = Color::orderBy('color')->get();
    
    $titolo = "Inserisci una nuova automobile";

    return view('automobile', compact('automobile', 'titolo', 'marchi', 'modelli', 'colori'));
}
    

public function storeautomobile(Request $request)
{
    // regular expression per targa = /^[A-Z]{2}\d{3}[A-Z]{2}
    $this->validate($request, ['targa' => 'required|regex:/^[A-Z]{2}\d{3}[A-Z]{2}$/i',
                                'modelloid' => 'required|regex:/^[1-9]*$/',
                                'coloreid' => 'required|regex:/^[1-9]*$/'
                                
                                ],
    [   
        'targa.regex' => 'La targa deve avere due lettere - tre numeri - due lettere',
        'targa.required' => 'Ricordati di inserire l\'automobile',
        'modelloid.required' => 'Modello richiesto',
        'modelloid.regex' => 'Ricordati di scegliere il modello',
        'coloreid.required' => 'Colore richiesto',
        'coloreid.regex' => 'Ricordati di scegliere il colore',
    ]);

    if(strlen($request->id) > 6)
    {
        // modifica
        $automobile = Car::where('targa', '=', $request->targa)->first();
    }
    else
    {
        $this->validate($request, ['targa' => 'required|unique:cars,targa|regex:/^[A-Z]{2}\d{3}[A-Z]{2}$/i',
                                'modelloid' => 'required|regex:/^[1-9]*$/',
                                'coloreid' => 'required|regex:/^[1-9]*$/'
                                
                                ],
    [   
        'targa.regex' => 'La targa deve avere due lettere - tre numeri - due lettere',
        'targa.required' => 'Ricordati di inserire l\'automobile',
        'targa.unique' => 'Specifica una targa inesistente',
        'modelloid.required' => 'Modello richiesto',
        'modelloid.regex' => 'Ricordati di scegliere il modello',
        'coloreid.required' => 'Colore richiesto',
        'coloreid.regex' => 'Ricordati di scegliere il colore',
    ]);
        $automobile = new Car;
        $automobile->targa = $request->targa;
    }

    $modello = Modelc::find($request->modelloid);

    
    $automobile->model_id = $request->modelloid;
    $automobile->color_id = $request->coloreid;
    $automobile->brand_id = $modello->brand_id;
    $automobile->save();

    return $this->listaautomobili();
}


public function modificaautomobile($idautomobile)
{
    
    $marchi = Brand::orderBy('brand')->get();

    $modelli = DB::table('models')
    ->leftjoin('brands', 'models.brand_id', '=', 'brands.id')
    ->select('models.*', 'brands.brand')
    ->orderBy('brand', 'asc')
    ->orderBy('model', 'asc')
    ->get();

    $colori = Color::orderBy('color')->get();

    $automobile = DB::table('cars')
    ->where('cars.targa', '=', $idautomobile)
    ->first();
    
    
    
    //dd($modelli);
    $titolo = "Modifica l'automobile " . "targata: " . $automobile->targa;

    return view('automobile', compact('automobile', 'titolo', 'marchi', 'modelli', 'colori'));
}

    
public function cancellaautomobile($targa)
{
    
    Car::find($targa)->delete();

    return $this->listaautomobili();
}

//////////////////////
// OWNER CONTROLLER //
//////////////////////

public function inserisciproprietario()
    {
        $proprietario = new Owner;
        $proprietario->nome = "";
        $proprietario->cognome = "";

        $titolo = "Inserisci un nuovo proprietario";

        return view('proprietario', compact('proprietario', 'titolo'));
    }
    

    public function storeproprietario(Request $request)
    {

        $this->validate($request, ['codice_fiscale' => 'required|regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
                                    'nome' => 'required|regex:/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/i',
                                    'cognome' => 'required|regex:/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/i'
                                    ],
        [
            'codice_fiscale.required' => 'Ricordati di inserire il codice fiscale',
            //'codice_fiscale.unique' => 'Specifica un codice fiscale non esistente',
            'codice_fiscale.regex' => 'Codice fiscale non corretto',
            'nome.required' => 'Nome richiesto',
            'nome.regex' => 'Nome non corretto',
            'cognome.required' => 'Cognome richiesto',
            'cognome.regex' => 'Cognome non corretto',
        ]);

        if(strlen($request->id) > 15)
        {
            
            // modifica
            $owner = Owner::where('codice_fiscale', '=', $request->codice_fiscale)->first();


        }
        else
        {

            $this->validate($request, ['codice_fiscale' => 'required|unique:owners,codice_fiscale|regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
                                        'nome' => 'required|regex:/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/i',
                                        'cognome' => 'required|regex:/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/i'
                                        ],
                                    [
                                    'codice_fiscale.required' => 'Ricordati di inserire il codice fiscale',
                                    'codice_fiscale.unique' => 'Specifica un codice fiscale non esistente',
                                    'codice_fiscale.regex' => 'Codice fiscale non corretto',
                                    'nome.required' => 'Nome richiesto',
                                    'nome.regex' => 'Nome non corretto',
                                    'cognome.required' => 'Cognome richiesto',
                                    'cognome.regex' => 'Cognome non corretto',
                                    ]);
            $owner = new Owner;
        }
        $owner->codice_fiscale = $request->codice_fiscale;
        $owner->nome = $request->nome;
        $owner->cognome = $request->cognome;
        //dd($owner);
        $owner->save();

        return $this->listaproprietari();
    }

    public function listaproprietari($errore = 0)
    {

        $proprietari = DB::table('owners')
        ->orderBy('cognome')
        ->get();
        //$proprietari = Owner::orderBy('nome', 'asc')->orderBy('cognome', 'asc')->get();
        //dd($proprietari);
        return view('proprietari', compact('proprietari', 'errore'));
        
    }

    public function modificaproprietario($idproprietario)
    {
        $proprietario = DB::table('owners')
        ->where('owners.codice_fiscale', '=', $idproprietario)
        ->first();

        //$proprietario = Owner::find($idproprietario);

        $titolo = "Modifica il Proprietario " . $proprietario->codice_fiscale;

        return view('proprietario', compact('proprietario', 'titolo'));
    }
    
    public function cancellaproprietario($codice_fiscale)
    {
        
        
        Owner::find($codice_fiscale)->delete();

        return $this->listaproprietari();
    }

///////////////////////////
// PROPRIETA' CONTROLLER //
///////////////////////////

    public function listaproprieta($errore = 0)
    {
        $proprieta = DB::table('car_owner')
        ->leftjoin('cars', 'car_owner.car_id', '=', 'cars.targa')
        ->leftjoin('owners', 'car_owner.owner_id','=', 'owners.codice_fiscale')
        ->leftjoin('models', 'models.id', '=', 'cars.model_id')
        ->select('car_owner.*', 'models.*', 'cars.*', 'owners.*')
        ->get();

        //dd($proprieta);

        return view('proprieta', compact('proprieta', 'errore'));

    }
    
    public function inserisciproprieta()
    {
        /*
        $automobile = new Car;
        
        $automobile->color_id = 0;
        $automobile->brand_id = 0;
        $automobile->model_id = 0;
        //$automobile->targa;
        */
    
        $proprieta = DB::table('car_owner')
        ->leftjoin('cars', 'car_owner.car_id', '=', 'cars.targa')
        ->leftjoin('owners', 'car_owner.owner_id', '=', 'owners.codice_fiscale')
        ->leftjoin('models', 'models.id', '=', 'cars.model_id')
        ->leftjoin('brands', 'models.brand_id', '=', 'brands.id')
        ->where('car_owner.data_vendita', '=', '0000-00-00')
        ->get();

        $acquirenti = Owner::all();
        

        //dd($proprieta);
        // dd($proprieta[$proprieta->id - 1]->data_acquisto);
        
        /*
        if(($proprieta[0]->data_acquisto)) {
            echo('data di aquisto presente') ;
        }
        */
        
        
        $titolo = "Inserisci una nuova proprietà";
    
        return view('inserisciproprieta', compact('proprieta','acquirenti', 'titolo'));
    }
    

}
