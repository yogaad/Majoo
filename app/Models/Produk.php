<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'harga_produk',
        'id_kategori',
        'image',
        
    ];
     
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class,'id_kategori');
    }

    public function UploadBase64($file, $name)
    {
        if (!Storage::exists('public/attachment')) 
            Storage::makeDirectory('public/attachment', 0777, true, true);

        Storage::disk('public')->put(
            'attachment/'. $name,
            $file
        );
    }
}
