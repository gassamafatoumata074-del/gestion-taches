<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de tâches</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .task {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 7px;
        }

        .completed {
            background: #eef8ee;
        }

        .actions {
            margin-top: 10px;
        }

        .actions a,
        .actions button {
            padding: 7px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit {
            background: #ddd;
            color: #222;
        }

        .complete {
            background: #222;
            color: white;
        }

        .delete {
            background: #b00020;
            color: white;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Gestionnaire de tâches</h1>

    <a href="{{ route('tasks.create') }}" class="button">
        + Ajouter une tâche
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($tasks as $task)

        <div class="task {{ $task->completed ? 'completed' : '' }}">

            <h3>
                {{ $task->title }}
            </h3>

            @if($task->description)
                <p>{{ $task->description }}</p>
            @endif

            <strong>
                Statut :
                {{ $task->completed ? 'Terminée' : 'À faire' }}
            </strong>

            <div class="actions">

                <a href="{{ route('tasks.edit', $task) }}" class="edit">
                    Modifier
                </a>

                @if(!$task->completed)
                    <form action="{{ route('tasks.complete', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="complete">
                            Terminer
                        </button>
                    </form>
                @endif

                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete"
                            onclick="return confirm('Voulez-vous supprimer cette tâche ?')">
                        Supprimer
                    </button>
                </form>

            </div>

        </div>

    @empty

        <p>Aucune tâche pour le moment.</p>

    @endforelse

</div>

</body>
</html>