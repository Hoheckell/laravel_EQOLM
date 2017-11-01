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
            <h1>Agendamento de importação</h1>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>