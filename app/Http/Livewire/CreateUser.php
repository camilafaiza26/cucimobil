<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateUser extends Component
{
    public $user;
    public $userId;
    public $action;
    public $button;


    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'user.email' => 'required|email|unique:users,email,' . $this->userId
        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'user.name' => 'required|min:3',
            'user.email' => 'required|email|unique:users,email',
            'user.username' => 'required|unique:users,username',
            'user.nohp' => 'required|max:20',
            'user.alamat' => 'required|max:250'
        ], $rules);
    }

    public function createUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        $password = $this->user['password'];

        if ( !empty($password) ) {
            $this->user['password'] = Hash::make($password);
        }
         
        $this->user['isDirectur'] = 0;

        User::create($this->user);

       
        $this->reset('user');

        toast('Data user berhasil tersimpan!','success');
        return redirect()->route('user');
    }

    public function updateUser ()
    {
        $this->resetErrorBag();
        $this->validate();
       //VALIDASI ERROR

        User::query()
            ->where('id', $this->userId)
            ->update([
                "name" => $this->user->name,
                "email" => $this->user->email,
                "nohp" => $this->user->nohp,
                "alamat" => $this->user->alamat,
                "username" => $this->user->username,
                "isDirectur" => 0,
            ]);

      
        toast('Data user berhasil terupdate!','success');
        return redirect()->route('user');
    }

    public function mount ()
    {
        if (!$this->user && $this->userId) {
            $this->user = User::find($this->userId);
        }

        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
