@extends('templates.template1')

@section('title',"Contatos")

@section('styles')
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Contatos</h2>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Facebook</th>
                    <th>Dt.Add</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contatos as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td>{{ $c->endereco }}</td>
                        <td>{{ $c->facebook }}</td>
                        <td>{{ $c->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $contatos->links('vendor.pagination.bootstrap-4') }}

@endsection

@section('styles')
@endsection