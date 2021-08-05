<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::paginate();
        return view('sitemanager.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null)
    {
        if(!is_null($id)){
            if($id){
                $agenda = Agenda::find($id);
                session()->flashInput(array_merge($agenda->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $action = route('sitemanager.agenda.update', $id);
            $method = 'PUT';
        }else{
            $action = route('sitemanager.agenda.store');
            $method = 'POST';
        }

        return view('sitemanager.agenda.form', compact('action', 'method'));
    }

    public function store()
    {
        return $this->save();
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function save($id = null)
    {
        if($id){
            $agenda = Agenda::find($id);
        }else{
            $agenda = new Agenda;
        }

        $agenda->date = request()->input('date');
        $agenda->time = request()->input('time');
        $agenda->caption = request()->input('caption');
        $agenda->description = request()->input('description');
        $agenda->location = request()->input('location');
        $agenda->save();

        $message = sprintf("Data Telah di %s ", $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.agenda.index')->withMessage($message);
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        if($agenda) {
            $agenda->delete();
            return redirect()->route('sitemanager.agenda.index')->withMessage('Data Telah Dihapus');
        }
        return redirect()->route('sitemanager.agenda.index')->withError('Data Tidak Ditemukan');
    }
}
