<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function create()
    {
        return view('player.add_benefit');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',      
            'benefit' => 'required', 
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO benefit(id_benefit, name, benefit) VALUES
        (:id_benefit, :name, :benefit)',
            [
                'id_benefit' => $request->id_benefit,
                'name' => $request->name,
                'benefit' => $request->benefit,
            ]
        );
        return redirect()->route('player.index_benefit')->with('success', 'Data benefit berhasil disimpan');
    }
    public function index()
    {
        $datas = DB::select('select * from benefit where b_deleted = 0');
        return view('player.index_benefit')->with('datas', $datas);
    }

    public function edit($id)
    {
        $data = DB::table('benefit')->where('id_benefit', $id)->first();
        return view('Player.edit_benefit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'benefit' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE benefit SET id_benefit = :id_benefit, name = :name, benefit = :benefit
            WHERE id_benefit = :id',
            [
                'id' => $id,
                'id_benefit' => $request->id_benefit,
                'name' => $request->name,
                'benefit' => $request->benefit,
            ]
        );
        return redirect()->route('player.index_benefit')->with('success', 'Data benefit berhasil diubah');
    }

    public function hdelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM benefit WHERE id_benefit =
            :id_benefit', ['id_benefit' => $id]);
        return redirect()->route('player.index_benefit')->with('success', 'Data benefit berhasil dihapus');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE benefit SET b_deleted = 1
        WHERE id_benefit = :id_benefit', ['id_benefit' => $id]);
        return redirect()->route('player.index_benefit')->with('success', 'Data benefit berhasil dihapus');
    }
}
