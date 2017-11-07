@extends('templates.template1')
@section('title',"IMPORTAÇÂO")
@section('styles')
    <style>
        .update-nag {
            display: inline-block;
            font-size: 14px;
            text-align: left;
            background-color: #fff;
            height: 40px;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            margin-bottom: 10px;
        }

        .update-nag:hover {
            cursor: pointer;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .4);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .3);
        }

        .update-nag > .update-split {
            background: #337ab7;
            width: 33px;
            float: left;
            color: #fff !important;
            height: 100%;
            text-align: center;
        }

        .update-nag > .update-split > .glyphicon {
            position: relative;
            top: calc(50% - 9px) !important; /* 50% - 3/4 of icon height */
        }

        .update-nag > .update-split.update-success {
            background: #5cb85c !important;
        }

        .update-nag > .update-split.update-danger {
            background: #d9534f !important;
        }

        .update-nag > .update-split.update-info {
            background: #5bc0de !important;
        }

        .update-nag > .update-text {
            line-height: 19px;
            padding-top: 11px;
            padding-left: 45px;
            padding-right: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xl-8">
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

        <div class="col-lg-4 col-xl-4">
            @if(!empty($noty))
                @foreach($noty as $n)
                    <div class="update-nag">
                        <div class="update-split"><i class="glyphicon glyphicon-refresh"></i></div>
                        <div class="update-text">Concluido arquivo {{$noty[0]->data->arquivo}} &nbsp; <a
                                    href="readnoty/{{$noty[0]->notifiable_id}}">Marcar como lida</a>
                        </div>
                    </div>
                @endforeach
            @endif
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
