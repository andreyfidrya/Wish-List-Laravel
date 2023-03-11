<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script language=javascript>
        function previewFile(){
            var preview = document.querySelector('img');
            var file  = document.querySelector('input[type=file]').files [0];
            var reader = new FileReader();
            reader.onloadend = function () {
            preview.src = reader.result;
            }
            if (file) {
            reader.readAsDataURL(file);
            } else {
            preview.src = "";
            }
        }
    </script>
</head>
<body>
   
    <section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Добавить новый товар
                    </div>
                    <div class="card-body">
                        @if(Session::has('product_added'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('product_added')}}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Выберите фото товара</label>
                                <input name="file" class="form-control" type="file" onchange="previewFile()">
                                <img src="" alt="Image preview" style="max-width:150px;margin-top:20px;" id="img"/>
                            </div>

                            <div class="form-group">
                                <label for="productname">Название товара</label>
                                <input type="text" name="productname" class="form-control"/>
                                @error('productname')<div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Категория</label>
                                <input type="text" name="category" class="form-control"/>
                                @error('category')<div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="store">Магазин</label>
                                <input type="text" name="store" class="form-control"/>                                
                            </div>

                            <div class="form-group">
                                <label for="price">Цена, $USD</label>
                                <input type="text" name="price" class="form-control"/>
                                @error('price')<div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    </body>
</html>