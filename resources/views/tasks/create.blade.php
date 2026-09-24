<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
        }

        button,
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        button {
            background: #222;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            background: #ddd;
            color: #222;
        }

        .errors {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Ajouter une tâche</h1>

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="title">Titre</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
        >{{ old('description') }}</textarea>

        <button type="submit">
            Ajouter la tâche
        </button>

        <a href="{{ route('tasks.index') }}">
            Annuler
        </a>

    </form>

</div>

</body>
</html>