<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('profileClient.update', auth()->user()->id) }}">   
     @csrf
    @method('PUT')
    
    <input type="text" name="nom" value="{{ auth()->user()->nom }}">
    <input type="email" name="email" value="{{auth()->user()->email }}">
    <input type="number" name="telephone" value="{{auth()->user()->telephone }}">

    <button type="submit">Enregistrer</button>
</form>
</body>
</html>