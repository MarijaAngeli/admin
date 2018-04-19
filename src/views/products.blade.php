<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>

<body>
    <ul>
        @foreach($products as $product)
            <li style="background: blueviolet; color: #5a6268;">{{ $product->name }} - {{$product->price}}</li>
        @endforeach
    </ul>
</body>
</html>