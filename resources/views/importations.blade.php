@extends('templates.template1')
@section('title',"IMPORTAÇÂO")
@section('content')
    <h1>importações</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Arquivo</th>
            <th>Dt.Envio</th>
            <th>Andamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($importations as $i)
            <?php
            // $noty = json_decode($i->notifications);
            // $noty[0]->data->arquivo
            ?>
            <tr>
                <td>{{$i->name}} </td>
                <td>{{$i->created_at->format('d/m/Y')}}</td>
                <td>
                    @if($i->error > 0)
                        <div class="alert alert-danger">Importação falhou</div>
                    @else
                        @if($i->totalines>0)
                            {{number_format(($i->donelines * 100)/$i->totalines,2,".","")}}%
                        @else
                            Aguardando 0%
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        setTimeout(function () {
            location.reload(true);
        }, 3000);
    </script>
@endsection
