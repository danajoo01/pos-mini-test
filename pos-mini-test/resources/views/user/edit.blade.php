@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">
                Edit User
            </x-slot>

            <x-form class="mb-4" method="patch" action="{{ route('user.update', ['user' => $user->id]) }}">
                <x-form-input name="name" label="Nama" :value="$user->name" />
                <x-form-input name="email" type="email" label="Email" :value="$user->email" />
                <x-form-input name="password" type="password" label="Password" />
                <x-form-input name="password_confirmation" type="password" label="Password Confirmation" />

                <x-form-submit id="form-submit" hidden />
            </x-form>

            <x-slot name="footer">
                <a class="btn btn-primary" href="#"
                    onclick="event.preventDefault(); document.getElementById('form-submit').click();">
                    Simpan
                </a>
            </x-slot>
        </x-card>

    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
