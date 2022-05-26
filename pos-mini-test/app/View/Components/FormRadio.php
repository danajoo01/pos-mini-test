<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormRadio extends Component
{
    public string $name;
    public string $label;
    public $value;

    public bool $checked = false;

    public function __construct(
        string $name,
        string $label = '',
        $value = 1
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;

        if (old($name) !== null) {
            $this->checked = old($name) == $value;
        } else {
            $this->checked = false;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-radio');
    }
}
