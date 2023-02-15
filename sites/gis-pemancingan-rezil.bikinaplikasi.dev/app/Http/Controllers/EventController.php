<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis;
use App\Models\Event;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if (in_array(auth()->user()->level, ['Admin'])) {
            $data['event'] = Event::paginate(1000);

        } else {
            $user_map_ids = Map::where('user_id', auth()->id())->pluck('id');
            $data['event'] = Event::where('map_id', $user_map_ids)->paginate(1000);
        }

        $data['event_count'] = count(Schema::getColumnListing('event'));

        return view('event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data['jenis'] = Jenis::pluck('nama', 'id');

        if (in_array(auth()->user()->level, ['Admin'])) {

            $data['map'] = Map::pluck('nama', 'id');
        } else {
            $data['map'] = Map::where('user_id', auth()->id())->pluck('nama', 'id');
        }

        return view('event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'map_id' => 'required|max:30',
            'nama' => 'required|max:30',
            'deskripsi' => 'required|max:255',
            'dari_tanggal' => 'required|date',
            'sampai_tanggal' => 'required|date',
            'gambar' => 'required|image',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        Event::create($requestData);

        return redirect()->route('event.index')->with('success', 'Berhasil menambah Event');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Event $event)
    {
        $data["item"] = $event;
        $data["event"] = $event;

        return view('event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        $data["event"] = $event;
        $data[strtolower("Event")] = $event;
        $data['jenis'] = Jenis::pluck('nama', 'id');
        
        if (in_array(auth()->user()->level, ['Admin'])) {

            $data['map'] = Map::pluck('nama', 'id');
        } else {
            $data['map'] = Map::where('user_id', auth()->id())->pluck('nama', 'id');
        }

        return view('event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'map_id' => 'required|max:30',
            'nama' => 'required|max:30',
            'deskripsi' => 'required|max:255',
            'dari_tanggal' => 'required|date',
            'sampai_tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('gambar')) {
            $requestData['gambar'] = str_replace("\\", "/", $request->file('gambar')
                ->move('uploads', time() . "." . $request->file('gambar')->getClientOriginalExtension()));
        }

        $event->update($requestData);

        return redirect()->route('event.index')->with('success', 'Berhasil mengubah Event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus!');
    }

    public function hapus_semua(Request $request)
    {
        $events = Event::whereIn('id', json_decode($request->ids, true))->get();

        Event::whereIn('id', $events->pluck('id'))->delete();

        return back()->with('success', 'Berhasil menghapus banyak data event');
    }

    public function laporan()
    {
        $data['limit'] = Event::count();

        return view('event.laporan.index', $data);
    }

    public function print(Request $request)
    {
        $table = (new Event)->getTable();
        $object = (new Event);

        $fields = [];
        foreach (DB::select("DESC $table") as $tableField) {
            $fields[] = $tableField->Field;
        }

        $this->validate($request, [
            'field' => 'required|in:' . implode(',', $fields),
            'order' => 'required|in:ASC,DESC',
            'limit' => 'required|integer|max:' . $object->get()->count(),
        ]);

        $data["events"] = $object->orderBy($request->field, $request->order)->limit($request->limit)->get();

        if (!$data["events"]->count()) {

            return back()->with('error', 'Data tidak ada!');
        }

        return view("event.laporan.print", $data);
    }

    public function persebaran()
    {
        $data['event'] = Event::where('status', 'Diterima')->get();

        return view('event.persebaran', $data);
    }
}