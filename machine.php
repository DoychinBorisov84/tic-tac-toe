<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function(){
        var random = Math.random();
        var floored = Math.floor(random * 10);
        var arrOfChoices = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        var possibleChoice = arrOfChoices[floored];
        console.log(random, floored, possibleChoice);
      })
</script>
</body>
</html>