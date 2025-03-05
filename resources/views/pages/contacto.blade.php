@php
    $hideNavbar = true;
@endphp

@extends('layouts.base')

@section('title', 'Contacto')

@section('content')
    <h1 class="display-5 fw-bold mb-4">Contáctanos</h1>
    <p>Si tienes dudas o sugerencias, contáctanos mediante el siguiente formulario o a nuestro correo:</p>

    <div class="my-3">
        <p><strong>Email:</strong> soporte@miapp.com</p>
        <p><strong>Teléfono:</strong> +54 11 1234-5678</p>
    </div>

    <h2 class="h4 mt-4">Formulario de Contacto</h2>

    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-6 col-lg-5">
            <form action="{{ route('contacto.enviar') }}" method="POST" class="card bg-dark text-light p-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje:</label>
                    <textarea name="mensaje" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Enviar
                </button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>
@endsection
