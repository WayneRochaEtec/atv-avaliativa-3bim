<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Biblioteca - Lista de Livros</title>
</head>

<body>
    <div class="container-flex">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Pessoas</span>
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/books/new" class="nav-link" aria-current="page">nova pessoa</a></li>
                    <li class="nav-item"><a href="/books" class="nav-link active">Ver todos</a></li>
                </ul>
            </header>
        </div>
        <main class="container align-center">
            @if (session()->get('delete_status') == 'sucess')
                <div class="alert alert-success" role="alert">
                    Pessoa Excluído!
                </div>
            @endif
            @if (session()->get('delete_status') == 'fail')
                <div class="alert alert-danger" role="alert">
                    Opa! Algo deu errado :( - Volte mais tarde
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="white-space: nowrap;">Nome</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{$book->name}}</td>
                            <td class="d-flex">
                                <form action="/books/edit/{{$book->id}}" method="get">
                                    <button type="submit" class="btn btn-outline-primary edit_client_btn">editar</button>
                                </form>
                                <form action="/library/delete-book/{{$book->id}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger delete_client_btn">excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @if (sizeof($books) == 0)
                <p>Não há pessoas cadastradas</p>
            @endif
        </main>
    </div>
    <style>
        body {
            overflow-x: hidden;
        }

        main {
            overflow-x: scroll;
        }

        :is(.phone, .origin, .date, .obs):empty::after {
            content: "--";
        }

        tbody:empty::after {
            content: "Nenhum livro cadastrado";
        }

        .client-name {
            text-transform: capitalize;
        }

        .client-note {
            white-space: nowrap;
            font-size: .8em;
        }

        tr {
            transition: background-color ease-in-out .3s;
        }

        tr:hover {
            background-color: rgb(240, 240, 240);
        }

        @media screen and (orientation: landscape) {
            main::-webkit-scrollbar {
                display: none;
            }
        }
    </style>

    <script src="index.js"></script>
</body>

</html>