<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
choisir 0 de 9 <br><select name="" id="">
   @for ( $i=0;$i<=9;$i++)
   <option>{{$i}}</option>
   @endfor </select>
<br> des nombre impaires de 0 a 100 <br><select name="" id="">
   @for ( $i=1;$i<=100;$i=$i+2)
   <option>{{$i}}</option>
   @endfor 
</select>
<br> des nombre impaires de 0 a 100 utilisant condition <br><select name="" id="">
   @for ( $i=0;$i<=100;$i++)
   @if($i%2!=0)
   <option>{{$i}}</option>
   @endif
   @endfor 
</select>
</body>
</html>