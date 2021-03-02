<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Mail\ContactReceiptMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $show_form = true;

    public $first_name;
    public $last_name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:10',
    ];

    public function submit(){
        $this->validate();

        Mail::to('adam@avalanchecalculator.com')->send(new ContactMail($this->email, $this->first_name, $this->last_name, $this->subject, $this->message));

        Mail::to($this->email)->send(new ContactReceiptMail($this->email, $this->first_name, $this->last_name, $this->subject, $this->message));

        $this->show_form = false;
    }

    public function mount(){
        if(Auth::check()){
            $user = Auth::user();

            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
