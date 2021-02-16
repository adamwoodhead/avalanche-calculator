<?php

namespace App\Http\Livewire;

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

        // submit the email

        $this->show_form = false;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
