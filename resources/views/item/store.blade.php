<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{!! route('get.items') !!}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{!! route('get.items') !!}">Home <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="card">
        <h5 class="card-header">Create Item</h5>
        <div class="card-body">



            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {!! Session::get('success') !!}
                </div>
            @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {!! Session::get('error') !!}
                    </div>
                @endif


                {!! Form::open(['url'=>route('item.store'),'method'=>'post','files'=>true]) !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="name" value="{!! old('name') !!}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1">
                    @error('name')
                    <span class="form-text text-danger">{!! $message !!}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" name="price" value="{!! old('price') !!}" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword1">
                    @error('price')
                    <span class="form-text text-danger">{!! $message !!}</span>
                    @enderror
                </div>
            <div class="form-group">

                <img src="{!! asset('default/default.png') !!}"  class="rounded float-left image-preview" style="width: 100px ; height: 100px" alt="...">
                <br>
                <br>
                <br>
                <br>
            </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload image</label>
                    <input type="file" name="image" class="form-control image  @error('image') is-invalid @enderror" id="exampleFormControlFile1">
                    @error('image')
                    <span class="form-text text-danger">{!! $message !!}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}


        </div>
    </div>




</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
    $(".image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
</body>
</html>
