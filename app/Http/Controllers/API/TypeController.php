<?php

namespace App\Http\Controllers\API;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    //hak akses
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }

     //lihat semua data
    public function index()
    {
        //$data = Type::all();
        $data = Type::with('relation_room')->get();
        return response()->json([
            'pesan' => 'data berhasil ditemukan',
            'data' => $data
        ],200); 
    }

    //tambah data
    public function store(Request $request)
    {   
            $validasi = Validator::make($request->all(), [
            "name"          => "required",
            "description"   => "required",
            "capacity"      => "required|integer",
            "facility"      => "required"
        ]);

        if ($validasi->passes()){
            $data = Type::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil ditambahkan',
                'data' => $data
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal disimpan',
            'data' => $validasi->errors()->all()
        ], 400);

    }

    //lihat data berdasarkan id
    public function show( $id)
    {
        //$data = Type::where('id' , $id)->first();
        $data = Type::with('relation_room')->get();
        if (empty($data)){
            return response()->json([
            'pesan' => 'data tidak ditemukan',
            'data' => ''
        ],404);
        }
        return response()->json([
            'pesan' => 'data berhasil ditemukan',
            'data' => $data
        ],200);
    }

    //update data
    public function update(Request $request, $id)
    {
        $data = Type::where('id', $id)->first();

        if (!empty($data)) {
            $validasi = Validator::make($request->all(), [
            "name"          => "required",
            "description"   => "required",
            "capacity"      => "required|integer",
            "facility"      => "required"
            ]);

            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    'pesan' => "Data Berhasil diupdate",
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'pesan' => 'Data Gagal di Update',
                    'data' => $validasi->errors()->all()
                ], 404);
            }
        }
        return response()->json([
                    'pesan' => "Data tidak ditemukan"]);
    }

    //hapus data
    public function destroy($id)
    {
        
        $data = Type::where('id' , $id)->first();
        if (empty($data)){
            return response()->json([
            'pesan' => 'data tidak ditemukan',
            'data' => ''
        ],404);
        }

        $data->delete();
        return response()->json([
            'pesan' => 'data berhasil dihapus',
            'data' => $data
        ],200);
    }
}
