<?php
 
namespace App\Http\Controllers\BackAdmin;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk; 
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    private $title = 'Produk';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $produk = Produk::query();
             

            return DataTables::of($produk->get())->addIndexColumn()
            ->addColumn('nama_kategori',function($data) use ($request) {
                return $data->kategori->nama_kategori;
            })
            ->editColumn('image',function($data) use ($request) {
                if(isset($data->image))
                    $image = '<img src="'.asset('storage/attachment/'.$data->image).'" alt="avatar" height="100" width="70">';
                else
                return '-';
                return $image;
            })
           ->rawColumns(['image'])

            ->make();
        }

        return view('backadmin.produk.index')->with([
            'title' => 'List',
            'subtitle' => 'Produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home( )
    {
        $data = Produk::all(); 
        
        return view('backadmin.landing.index')->with([
           
            'subtitle' => 'Produk',
            'data' => $data, 
        ]);
    }

    public function create()
    {
        return view('backadmin.produk.form', [
            'title' => 'Form',
            'subtitle' => $this->title,
            'data' => new Produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'nama_produk' => 'required|unique:produks',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
             'id_kategori' => 'required',
            'image' => 'required'
        ]);
        // dd($request->all());
        $data =  Produk::make($request->except('_token'));
        if($request->image !=  null) {
            $extension = explode('/', mime_content_type($request->image))[1];
            $file = explode(',', $request->image, 2)[1];
            $file_name = time() . '-' . Str::uuid()->toString() . '.'.$extension;
            $decoded_image = base64_decode($file);
            $data->image = $file_name;
            $data->UploadBase64($decoded_image, $file_name);
        // dd($file_name);

        
        }
        $data->save();
        return redirect()->route('backadmin.produk.index')->withSuccess('Produk berhasil disimpan');
         
      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {  
        return view('backadmin.produk.form', [
            'title' => 'Form',
            'subtitle' => $produk->nama_produk,
            'data' => $produk, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        
        $request->validate([ 
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
             'id_kategori' => 'required', 
        ]);
        $produk->fill($request->except('_token'));
        if($request->image !=  null && $request->image !=$request->id_resume_file_url) {
            
         
                
           
   
            $extension = explode('/', mime_content_type($request->image))[1];
            $file = explode(',', $request->image, 2)[1];
            $file_name = time() . '-' . Str::uuid()->toString() . '.'.$extension;
            $decoded_image = base64_decode($file);
            
            $produk->image = $file_name;
            $produk->UploadBase64($decoded_image, $file_name);
        // dd($file_name);
              $produk->save();
        } else{
            $produk->image = $request->id_resume_file_url;
        $produk->save();

        }
        return redirect()->route('backadmin.produk.index')->withSuccess('Produk berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('backadmin.produk.index')->withSuccess('Produk berhasil dihapus');
    }
}
