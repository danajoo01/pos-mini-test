<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public string $name;
    public string $label;
    public bool $inline;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name = '', string $label = '', bool $inline = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->inline = $inline;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-group');
    }
}
