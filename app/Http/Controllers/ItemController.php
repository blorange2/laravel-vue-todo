<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create([
            'name' => $request->item['name']
        ]);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existing = Item::find($id);

        if ($existing) {
            $existing->update([
                'completed' => $request->item['completed'] ? 1 : 0,
                'completed_at' => $request->item['completed'] ? Carbon::now() : false
            ]);

            return $existing;
        }

        return new ModelNotFoundException;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing = Item::find($id);

        if ($existing) {
            $existing->delete();

            return response()->json(null, 200);
        }

        return new ModelNotFoundException;
    }
}
