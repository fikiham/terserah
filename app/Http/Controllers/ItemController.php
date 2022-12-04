<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('player.add_item');
    }
    public function store(Request $request)
    {
        $request->validate([

            'item_name' => 'required',      
            'icon_source' => 'required', 
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO Item(id_item, item_name, icon_source, id_benefit) VALUES
        (:id_item, :item_name, :icon_source, :id_benefit)',
            [
                'id_item' => $request->id_item,
                'item_name' => $request->item_name,
                'icon_source' => $request->icon_source,
                'id_benefit' => $request->id_benefit,
            ]
        );
        return redirect()->route('player.item_index')->with('success', 'Data Item berhasil disimpan');
    }
    public function index()
    {
        $datas = DB::select('select * from Item where i_deleted = 0');
        return view('player.item_index')->with('datas', $datas);
    }

    public function edit($id)
    {
        $data = DB::table('Item')->where('id_item', $id)->first();
        return view('Player.edit_item')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'icon_source' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE Item SET id_item = :id_item, item_name = :item_name, icon_source = :icon_source, id_benefit = :id_benefit
            WHERE id_item = :id',
            [
                'id' => $id,
                'id_item' => $request->id_item,
                'item_name' => $request->item_name,
                'icon_source' => $request->icon_source,
                'id_benefit' => $request->id_benefit,
                
            ]
        );
        return redirect()->route('player.item_index')->with('success', 'Data Item berhasil diubah');
    }

    public function hdelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM Item WHERE id_item =
            :id_item', ['id_item' => $id]);
        return redirect()->route('player.item_index')->with('success', 'Data Item berhasil dihapus');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE item SET i_deleted = 1
        WHERE id_item = :id_item', ['id_item' => $id]);
        return redirect()->route('player.item_index')->with('success', 'Data Item berhasil dihapus');
    }
}
