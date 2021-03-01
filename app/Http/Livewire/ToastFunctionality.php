<?php

namespace App\Http\Livewire;

use App\Enums\ToastType;

trait ToastFunctionality
{
    public function sendToast($type, $text, $cta_text = null, $cta_link = null){
        $data = [
            'type' => $type,
            'text' => $text,
            'cta' => null
        ];

        if($cta_link != null && $cta_text != null){
            $data['cta'] = [
                'text' => $cta_text,
                'link' => $cta_link
            ];
        }

        $this->dispatchBrowserEvent('notice', $data);
    }
}