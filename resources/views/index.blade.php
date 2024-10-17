@extends('layouts.master')

@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        img {
            width: 1400px;
            height: 510px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .text {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

    </style>

    <img src="{{ asset('img/w.jpg') }}" alt="Imagine eveniment" />
    <div class="text">
        <h2>Evenimente</h2>
        <p>
            Bun venit pe site-ul nostru unde aveți la dispoziție o gamă variată de evenimente la care puteți participa.
        </p>
    </div>
@endsection
