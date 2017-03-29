<?php

namespace Yk\LaravelUsers\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Yk\LaravelUsers\App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::orderBy('id', 'desc')->paginate('10');

        return view('Yk\LaravelUsers::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Yk\LaravelUsers::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            if($request->ajax())
            {
                return Response::json($validator->messages(), 400);
            }else{
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }else{
            $user->password = '';
        }

        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('Yk\LaravelUsers::users.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email', Rule::unique('users')->ignore($id),
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            if($request->ajax())
            {
                return Response::json($validator->messages(), 400);
            }else{
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('Yk\LaravelUsers::users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect(route('users.index'));
    }
}
