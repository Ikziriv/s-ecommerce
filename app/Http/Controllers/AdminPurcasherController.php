<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Purcasher;

class AdminPurcasherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $purcashers = Purcasher::where('name', 'LIKE', '%'.$q.'%')->orderBy('name')->paginate(1);
        $purcashers->transform(function ($purcasher, $key) {
            $purcasher->cart = unserialize($purcasher->cart);
            return $purcasher;
        });
        return view('admin.pages.purcasher.index', compact('purcashers', 'q'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purcasher::find($id)->delete();
        \Flash::success('Purcasher deleted.');
        return redirect()->route('purcasher.index');
    }
}
