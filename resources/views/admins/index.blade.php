@extends('layouts.admin_master')

@section('content')
    <style>
        .admin-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .admin-button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .admin-button:hover {
            background-color: #2980b9;
        }

    </style>

    <main>
        <section class="text">
            <h2>Panoul de control</h2>

            <div class="admin-buttons">
                <button class="admin-button" onclick="location.href='{{ route('events.create') }}'">Creare Eveniment</button>


                <button class="admin-button" onclick="location.href='{{ route('events.index') }}'">Listă Evenimente</button>
                <button class="admin-button" onclick="location.href='{{ route('entities.create') }}'">Entitate Eveniment</button>
            </div>
        </section>
    </main>
@endsection
