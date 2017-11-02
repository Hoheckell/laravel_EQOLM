@extends('templates.template1')
@section('title',"IMPORTAÇÂO")
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Envio para importação</h1>
            <p>O arquivo enviado entrará em uma fila de processamento.</p>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form action="/upload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="photo" class="form-control">
                <input type="submit">
            </form>
        </div>
    </div>
</div>
    @endsection
