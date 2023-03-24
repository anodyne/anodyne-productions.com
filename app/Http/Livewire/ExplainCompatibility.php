<?php

namespace App\Http\Livewire;

use WireElements\Pro\Components\Modal\Modal;

class ExplainCompatibility extends Modal
{
    public function render()
    {
        return view('livewire.explain-compatibility');
    }

    public static function attributes(): array
    {
        return [
            'size' => '4xl',
        ];
    }
}
