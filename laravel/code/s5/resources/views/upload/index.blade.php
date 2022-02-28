<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4">
        <h1>Upload image</h1>

        @if(Session::has('success'))
            <div class="alert alert-info">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-warning">
                {{ Session::get('error') }}
            </div>
        @endif

        <form action="{{ route('upload-image-action') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control" />
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Upload image</button>
        </form> 

        <div class="my-4"></div>

        @if(Session::has('filename'))
        <img src="{{ asset('uploads/'.Session::get('filename')) }}" height="200" alt="My camera" />
        @endif

    </div>
</body>
</html>
