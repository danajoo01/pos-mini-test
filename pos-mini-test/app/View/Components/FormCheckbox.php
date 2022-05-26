<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class FormCheckbox extends Component
{
    public string $name;
    public string $label;
    public $value;

    public bool $checked = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        $value = 1
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;

        $inputName = static::convertBracketsToDots(Str::before($name, '[]'));
        if ($oldData = old($inputName)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
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
        return view('components.form-checkbox');
    }

    /**
     * Converts a bracket-notation to a dotted-notation.
     *
     * @param string $name
     *
     * @return string
     */
    protected static function convertBracketsToDots($name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }
}
