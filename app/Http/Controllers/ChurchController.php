<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateChurchFormRequest;
use App\Models\Church;
use App\Models\State;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    protected $model;

    public function __construct(Church $church)
    {
        $this->model = $church;
    }

    public function index(Request $request)
    {
        $churches = $this->model->where('name', 'LIKE', "%{$request->search}%")->get();

        return view('churches.index', compact('churches'));
    }

    public function show($id)
    {
        if (!$church = $this->model->find($id))
            return redirect()->route('churches.index');

        return view('churches.show', compact('church'));
    }

    public function create()
    {
        $states = State::select("id", "name")->get();

        return view('churches.create', compact('states'));
    }

    public function store(StoreUpdateChurchFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->has('headquarters')) {
            $data['headquarters'] = true;
        } else {
            $data['headquarters'] = false;
        }

        $this->model->create($data);

        return redirect()->route('churches.index');
    }

    public function edit($id)
    {
        if (!$church = $this->model->find($id))
            return redirect()->route('churches.index');

        $states = State::select("id", "name")->get();

        return view('churches.edit', compact('church', 'states'));
    }

    public function update(Request $request, $id)
    {
        if (!$church = $this->model->find($id))
            return redirect()->route('churches.index');

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->has('headquarters')) {
            $data['headquarters'] = true;
        } else {
            $data['headquarters'] = false;
        }

        $church->update($data);

        return redirect()->route('churches.index');
    }

    public function destroy($id)
    {
        if (!$church = $this->model->find($id))
            return redirect()->route('churches.index');

        $church->delete();

        return redirect()->route('churches.index');
    }
}
