<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route("product.store")}}">
        @csrf
        @method("post")
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" id="">
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="quantity" placeholder="Quantity" id="">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" id="">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" id="">
        </div>
        <div>
            <select id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Save a New Product">
        </div>
    </form>
</body>
</html>