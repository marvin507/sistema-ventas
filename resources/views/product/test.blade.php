<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     @foreach($productos as $producto)
      <ul>
        <li>{{$producto->nombre}}</li>
        <p>{{$producto->categories->name}}</p>
      </ul>
      @endforeach
  </body>
</html>
