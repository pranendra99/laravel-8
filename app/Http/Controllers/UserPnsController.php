<?php

namespace App\Http\Controllers;

use App\Models\UserPns;
use Illuminate\Http\Request;

class UserPnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userpns = UserPns::latest()->paginate(5);
        return view('userpns.index', [
            'userpns' => $userpns
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('userpns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip' => 'required|max:11',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->storeAs('public/images', $name);


        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $userpns = UserPns::create($input);

        // $userpns = UserPns::create([
        //     'nip' => $request->nip,
        //     'nama' => $request->nama,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'alamat' => $request->alamat,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'image' => $path,
        // ]);

        return redirect()->route('userpns.index')
        ->with('success_message', 'Data User PNS baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $userpns = UserPns::find($id);
        // return view('userpns.show', compact('userpns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $userpns = UserPns::find($id);
        if (empty($userpns)) {
            return redirect()->route('userpns.index')
            ->with('error_message', 'Data User PNS dengan id ' . $id . ' tidak ditemukan.');
        }
        return view('userpns.edit', compact('userpns'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nip' => 'required|max:11',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->storeAs('public/images', $name);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $userpns = UserPns::find($id);
        // $userpns->nip = $request->nip;
        // $userpns->nama = $request->nama;
        // $userpns->tempat_lahir = $request->tempat_lahir;
        // $userpns->alamat = $request->alamat;
        // $userpns->tanggal_lahir = $request->tanggal_lahir;
        // $userpns->jenis_kelamin = $request->jenis_kelamin;
        // $userpns->name = $name;

        // $userpns->image = $request->file('image')->storeAs('public/images', $name);
        $userpns->update($input);


        // $userpns->update([
        //     'nip' => $request->nip,
        //     'nama' => $request->nama,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'alamat' => $request->alamat,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'image' => $path,
        // ]);
        
        return redirect()->route('userpns.index')
        ->with('success_message', 'Data User PNS id '. $id .'berhasil diubah');


        // $userpns->update($request->all());
        // return redirect()->route('userpns.index')
        // ->with('success_message', 'Berhasil mengubah data User PNS.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $userpns = UserPns::find($id);
        
        // if ($id == $request->user()->id) return redirect()->route('userpns.index')
        // ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');

        if (empty($userpns)) {
            return redirect()->route('userpns.index')
            ->with('error_message', 'Data User PNS dengan id ' . $id . ' tidak ditemukan.');
        }

        $userpns->delete();
        return redirect()->route('userpns.index')
        ->with('success_message', 'Berhasil menghapus data User PNS.');

    }

    public function search(Request $request)
    {
        $userpns = UserPns::where('nip', 'LIKE', '%' . $request->search . '%')
        ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
        ->orWhere('tempat_lahir', 'LIKE', '%' . $request->search . '%')
        ->orWhere('alamat', 'LIKE', '%' . $request->search . '%')
        ->orWhere('tanggal_lahir', 'LIKE', '%' . $request->search . '%')
        ->orWhere('jenis_kelamin', 'LIKE', '%' . $request->search . '%')
        ->paginate(5);
        return view('userpns.index', compact('userpns'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function foto(Request $request)
    // {

    // }
}
