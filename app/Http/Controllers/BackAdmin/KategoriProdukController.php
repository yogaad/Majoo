<?php

namespace App\Http\Controllers\BackAdmin;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str; 

class KategoriProdukController extends Controller
{
    private $title = 'Kategori Produk';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = KategoriProduk::query();
          

            return DataTables::of($kategori->get())->addIndexColumn()->make();
        }

        return view('backadmin.kategori_produk.index')->with([
            'title' => 'List',
            'subtitle' => 'Kategori Produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backadmin.kategori_produk.form', [
            'title' => 'Form',
            'subtitle' => $this->title,
            'data' => new KategoriProduk
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
             'nama_kategori' => 'required'
         ]);
         try {
             DB::beginTransaction();
                    $data = KategoriProduk::make($request->except('_token'));
                    $data->save();
                
                 
                     
             DB::commit();
         } catch (InvalidEntityException $e) {
             DB::rollBack();
             report($e);
 
             return redirect()->back()->withInput()->withError($e->getMessage());
         }
 
         return redirect()->route('backadmin.kategori-produk.index')->withSuccess('User berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('backadmin.kategori_produk.form', [
            'title' => 'Form',
            'subtitle' => $kategoriProduk->nama_kategori,
            'data' => $kategoriProduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);
        try {
            DB::beginTransaction();
                $kategoriProduk->fill($request->except('_token'));
                
                $kategoriProduk->save();
                
            DB::commit();
        } catch (InvalidEntityException $e) {
            DB::rollBack();
            report($e);

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
        
            return redirect()->route('backadmin.kategori-produk.index')->withSuccess('KategoriProduk  berhasil diubah');
  
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        $kategoriProduk->delete();
        return redirect()->route('backadmin.kategori-produk.index')->withSuccess('kategoriProduk berhasil dihapus');
    }

    public function getS2Options(Request $request)
    {
        $term = $request->q;
        $query = KategoriProduk::query()
            ->select('id','nama_kategori')
            ->where('nama_kategori', 'like', '%' . $term . '%');

        return $query->get();
    }
    public function getS2Init(Request $request)
    {
        return KategoriProduk::select(['id', 'nama_kategori'])
            ->where('id', $request->id)
            ->first();
    }
}
