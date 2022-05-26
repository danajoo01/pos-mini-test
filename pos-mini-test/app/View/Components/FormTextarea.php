<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormTextarea extends Component
{
    public string $name;
    public string $label;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $label)
    {
        $this->name = $name;
        $this->label = $label;

        // Set Value
        $this->value = old("{$name}");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-textarea');
    }
}
