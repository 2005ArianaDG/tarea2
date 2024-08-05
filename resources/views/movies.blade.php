<!DOCTYPE html>
<html>

<head>
    <title>Movies by Genre: {{ $genre }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #6c757d;
        }

        .table {
            background-color: #E8F5E9;
            border-color: #dee2e6;
        }

        tr {
            color: #495057;
            text-decoration: none;
        }

        tr:hover {
            color: #007bff;
        }

        .container {
            margin-top: 20px;
        }
        header,
        footer {
            background: linear-gradient(to right, #C8E6C9, #BBDEFB);
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header class="header py-3 shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                <h1 class="mt-5">Peliculas por genero: {{ $genre }}</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <a href='{{ url('/') }}' class="btn btn-outline-secondary mb-3">Volver</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Studio</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->studio }}</td>
                        <td>
                            <a href="{{ url('/movies/edit/' . $movie->id) }}" class="btn btn-outline-info btn-sm">Editar</a>
                            <form action="{{ url('/movies/delete/' . $movie->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>