<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InvtItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InvtItemCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Session::forget('datacategory');
        $data = InvtItemCategory::where('data_state', 0)
        ->where('company_id', Auth::user()->company_id)
        ->get();
        return view('content.InvtItemCategory.ListInvtItemCategory', compact('data'));
    }

    public function addItemCategory()
    {
        $datacategory = Session::get('datacategory');
        return view('content.InvtItemCategory.FormAddInvtItemCategory',compact('datacategory'));
    }

    public function elementsAddItemCategory(Request $request)
    {
        $datacategory = Session::get('datacategory');
        if(!$datacategory || $datacategory == ''){
            $datacategory['item_category_code']    = '';
            $datacategory['item_category_name']    = '';   
            $datacategory['item_category_remark']  = '';
        }
        $datacategory[$request->name] = $request->value;
        Session::put('datacategory', $datacategory);
    }

    public function addReset()
    {
        Session::forget('datacategory');
        return redirect()->back();
    }

    public function processAddItemCategory(Request $request)
    {
        $fields = $request->validate([
            'item_category_code'     => 'required',
            'item_category_name'     => 'required',
            'item_category_remark'   => 'required'
        ]);

        $data = InvtItemCategory::create([
            'item_category_code'        => $fields['item_category_code'],
            'item_category_name'        => $fields['item_category_name'],
            'item_category_remark'      => $fields['item_category_remark'],
            'company_id'                => Auth::user()->company_id,
            'updated_id'                => Auth::id(),
            'created_id'                => Auth::id(),
        ]);

        if($data->save()){
            $msg = 'Tambah Kategori Berhasil';
            return redirect('/item-category/add')->with('msg',$msg);
        } else {
            $msg = 'Tambah Kategori Gagal';
            return redirect('/item-category/add')->with('msg',$msg);
        }
    }

    public function editItemCategory($item_category_id)
    {
        $data = InvtItemCategory::where('item_category_id',$item_category_id)->first();
        return view('content.InvtItemCategory.FormEditInvtItemCategory', compact('data'));
    }

    public function processEditItemCategory(Request $request)
    {
        $fields = $request->validate([
            'category_id'       => '',
            'category_code'     => 'required',
            'category_name'     => 'required',
            'category_remark'   => 'required'
        ]);

        $table                          = InvtItemCategory::findOrFail($fields['category_id']);
        $table->item_category_code      = $fields['category_code'];
        $table->item_category_name      = $fields['category_name'];
        $table->item_category_remark    = $fields['category_remark'];
        $table->updated_id  = Auth::id();

        if($table->save()){
            $msg = "Ubah Kategori Barang Berhasil";
            return redirect('/item-category')->with('msg', $msg);
        } else {
            $msg = "Ubah Kategori Barang Gagal";
            return redirect('/item-category')->with('msg', $msg);
        }
    }

    public function deleteItemCategory($item_category_id)
    {
        $table              = InvtItemCategory::findOrFail($item_category_id);
        $table->data_state  = 1;
        $table->updated_id  = Auth::id();

        if($table->save()){
            $msg = "Hapus Kategori Barang Berhasil";
            return redirect('/item-category')->with('msg', $msg);
        } else {
            $msg = "Hapus Kategori Barang Gagal";
            return redirect('/item-category')->with('msg', $msg);
        }
    }
}
