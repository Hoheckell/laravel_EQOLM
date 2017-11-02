<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-12">
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
                            <td>{{$i->name}}</td>
                            <td>{{$i->created_at->format('d/m/Y')}}</td>
                            <td>
                                @if($i->totalines>0)
                                    {{number_format(($i->donelines * 100)/$i->totalines,2,".","")}}%
                                    @else
                                    Aguardando 0%
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script>
    setTimeout(function() {
        location.reload(true);
    },3000);
</script>
</body>
</html>