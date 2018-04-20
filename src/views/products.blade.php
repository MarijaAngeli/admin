<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>

<body>
    <ul>
        @foreach($products as $product)
            <li style="background: blueviolet; color: whitesmoke;">{{ $product->name }} - {{$product->price}}</li>
        @endforeach
    </ul>
</body>
</html>