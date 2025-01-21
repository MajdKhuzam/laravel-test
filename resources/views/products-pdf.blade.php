<!DOCTYPE html>
<html>
<head>
<style>
#products {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#products td, #products th {
  border: 1px solid #ddd;
  padding: 8px;
}

#products tr:nth-child(even){background-color: #f2f2f2;}

#products tr:hover {background-color: #ddd;}

#products th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1F2937;
  color: white;
}
</style>
</head>
<body>

<h1>Products Table</h1>

<table id="products">
  <tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Price</th>
  </tr>
  @foreach ($products as $product)
  <tr>
      <td>{{ $product->id }}</td>
      <td>{{ $product->product }}</td>
      <td>{{ $product->price }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>


