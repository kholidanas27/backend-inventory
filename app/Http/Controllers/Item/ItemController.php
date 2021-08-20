<?php
 
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        //get data from table item
        $items = Item::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $items 
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $items = Item::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Items',
            'data'    => $items 
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_item' => 'required',
            'unit' => 'required',
            'stok' => 'required',
            'harga_satuan' => 'required',
            'gambar' => 'required'

        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $items = Item::create([
            'nama_item' => $request->nama_item,
            'unit' => $request->unit,
            'stok' => $request->stok,
            'harga_satuan' => $request->harga_satuan,
            'gambar' => $request->gambar,

        ]);

        //success save to database
        if($items) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $post  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Items Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Item $items)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_item' => 'required',
            'unit' => 'required',
            'stok' => 'required',
            'harga_satuan' => 'required',
            'gambar' => 'required'
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $items = Item::findOrFail($items->id);

        if($items) {

            //update post
            $items->update([
            'nama_item' => $request->nama_item,
            'unit' => $request->unit,
            'stok' => $request->stok,
            'harga_satuan' => $request->harga_satuan,
            'gambar' => $request->gambar,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $items  
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find post by ID
        $items = Item::findOrfail($id);

        if($items) {

            //delete post
            $items->delete();

            return response()->json([
                'success' => true,
                'message' => 'Items Deleted',
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);
    }
}