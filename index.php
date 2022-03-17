<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icon.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Tic Tac Toe</title>
  </head>

  <body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <table>
                <?php
                $counter = 1;
                for($row = 1; $row <= 3; $row++) {
                    echo " <tr>";
                        for ($cell = 1; $cell <= 3; $cell++) { 
                            echo  "<td><button id='$counter' class='btn btn-secondary customButton' data-player='' data-occupied='0'></button></td>";
                            $counter++;
                        }
                        echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="d-flex justify-content-center" id="result">&nbsp</div>
        <div class="d-flex justify-content-center" id="reset-div">
            <button type="button" class="btn btn-danger" id="reset-btn">New Game</button>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/turn.js"></script>    
  </body>
</html>