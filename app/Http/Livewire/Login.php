<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
  public $noPeserta, $kataSandi, $remember = false;

  public function submit()
  {
    $this->validate([
      'noPeserta' => 'required',
      'kataSandi' => 'required',
    ]);

    if (Auth::attempt(['no_peserta' => $this->noPeserta, 'password' => $this->kataSandi, 'level' => 1], $this->remember)) {
      Auth::logoutOtherDevices($this->kataSandi, 'kata_sandi');
      redirect('/');
    } else {
      session()->flash('danger', 'Kredensial tidak valid');
    }
  }

  public function render()
  {
    return view('livewire.login');
  }
}
