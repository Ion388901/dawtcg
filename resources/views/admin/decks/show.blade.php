@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Deck
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Nombre del deck: {{ $data['deck']->name }}</h3>
                    <div class="pull-right box-tools">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.decks.cards.create', ['deck' => $data['deck']]) }}">
                            Agregar nueva carta
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    @if (!$data['deck']->cards->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Ataque</th>
                                    <th>Defensa</th>
                                    <th>Categoría</th>
                                    <th>Creado</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['deck']->cards as $card)
                            <tr>
                                <td>{{ $card->id }}</td>
                                <td>{{ $card->name }}</td>
                                <td>{{ $card->attack }}</td>
                                <td>{{ $card->defense }}</td>
                                <td>
                                    <span style="color:{{ $card->category->hex_color }}">
                                        {{ $card->category->name }}
                                    </span>
                                </td>
                                <td>{{ $card->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Este deck no tiene cartas: <a href="{{ route('admin.decks.cards.create', ['deck' => $data['deck']]) }}">agrega una aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection