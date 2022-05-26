<?php

namespace App\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Request method.
     */
    public string $method;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing.
     */
    public bool $spoofMethod = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method = 'POST')
    {
        $this->method = strtoupper($method);

        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Returns a boolean wether the error bag is not empty.
     *
     * @param string $bag
     *
     * @return bool
     */
    public function hasError($bag = 'default'): bool
    {
        $errors = View::shared('errors', fn () => request()->session()->get('errors', new ViewErrorBag()));

        return $errors->getBag($bag)->isNotEmpty();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
