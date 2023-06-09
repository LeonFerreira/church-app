<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Church;
use App\Models\ChurchUser;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->where('name', 'LIKE', "%{$request->search}%")->get();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        $states = State::select("id", "name")->get();
        $churches = Church::select("id", "name")->get();

        return view('users.create', compact('states'), compact('churches'));
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            $user = $this->model->create($data);

            if ($request->church_id) {
                $user->churches()->attach($request->church_id);
            }
        });

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $states = State::select("id", "name")->get();
        $churches = Church::select("id", "name")->get();

        return view('users.edit', compact('user', 'states', 'churches'));
    }

    public function update(Request $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user->update($data);

        if ($request->church_id) {
            // $user->churches()->detach($user->church_id);

            // $user->churches()->attach($request->church_id);

            $user->churches()->sync($request->church_id);
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }
}
