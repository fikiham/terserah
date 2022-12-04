<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function create()
    {
        return view('player.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required', 
            'name' => 'required',      
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO Player(username, name, level, id_item) VALUES
        (:username, :name, :level, :id_item)',
            [
                'username' => $request->username,
                'name' => $request->name,
                'level' => $request->level,
                'id_item' => $request->id_item,
            ]
        );
        return redirect()->route('player.index')->with('success', 'Data Player berhasil disimpan');
    }
    public function index()
    {
        $datas = DB::select('SELECT * FROM `player` WHERE deleted = 0');
        return view('player.index')->with('datas', $datas);
    }

    public function edit($id)
    {
        $data = DB::table('player')->where('username', $id)->first();
        return view('player.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE player SET username = :username, name = :name, level = :level, id_item = :id_item
            WHERE username = :id',
            [
                'id' => $id,
                'username' => $request->username,
                'name' => $request->name,
                'level' => $request->level,
                'id_item' => $request->id_item,
            ]
        );
        return redirect()->route('player.index')->with('success', 'Data Player berhasil diubah');
    }

    public function hdelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM Player WHERE username =
            :username', ['username' => $id]);
        return redirect()->route('player.index')->with('success', 'Data Player berhasil dihapus');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE player SET deleted = 1
        WHERE username = :username', ['username' => $id]);
        return redirect()->route('player.index')->with('success', 'Data Player berhasil dihapus');
    }

    public function indexSum()
    {
        $datas = DB::select('select * from 
        (SELECT player.username, player.name, player.level, item.item_name, benefit.benefit, player.deleted
        FROM player
        LEFT JOIN item
        ON player.id_item = item.id_item
        left JOIN benefit
        on item.id_benefit = benefit.id_benefit)tb 
        WHERE deleted = 0');
        return view('player.index_summary')->with('datas', $datas);
    }

    public function searchSum(Request $request)
    {
        $request->validate([
            'name' => 'required',      
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        $datas = DB::select('select * from 
        (SELECT player.username, player.name, player.level, item.item_name, benefit.benefit, player.deleted
        FROM player
        LEFT JOIN item
        ON player.id_item = item.id_item
        left JOIN benefit
        on item.id_benefit = benefit.id_benefit)tb 
        WHERE name = :name and deleted = 0', ['name' => $request->name,]);
        return view('player.index_summary')->with('datas', $datas);
    }
}
