<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
        $(function(){
            $("button").on('click', function(){
                var humanSelectedButtonId = $(this).attr('id');
                // console.log(humanSelectedButtonId);
                // console.log($(this).data('occupied'));
                if(!$(this).data('occupied')){
                    $(this).addClass('btn-danger disabled');
                    $(this).removeClass('btn-secondary');
                    $(this).attr('data-occupied', 1);
                    $(this).attr('data-player', 'human');
                    $(this).text('X');
                    
                    // Temp disable the buttons
                    $('button').each(function(){
                        $(this).addClass('disabled');
                    });

                    checkWinStatus(humanSelectedButtonId, "human");


                    // Run the machine turn
                    setTimeout(() => {
                        machineTurn();
                    }, 2000); 
                }
            });

            function machineTurn(){
                 var possibleChoices = $('[data-occupied="0"]');
                 var numberOfPossibleChoices = possibleChoices.length;
                 var random = Math.random();
                 var machineRandomChoice = Math.floor(random * numberOfPossibleChoices);

                var machineButtonClicked = possibleChoices[machineRandomChoice];
                var machineButtonClickedId = $(machineButtonClicked).attr('id');
                
                $(machineButtonClicked).addClass('btn btn-success disabled');
                $(machineButtonClicked).removeClass('btn-secondary');
                $(machineButtonClicked).text('O');
                $(machineButtonClicked).attr('data-occupied', 1);
                $(machineButtonClicked).attr('data-player', 'computer');

                // Re enable the buttons
                $('[data-occupied="0"]').each(function(){
                    $(this).removeClass('disabled');
                })

                checkWinStatus(machineButtonClickedId, "machine");
                //  console.log(possibleChoices, numberOfPossibleChoices, machineRandomChoice, machineButtonClicked, machineButtonClickedId);
            }
            4. Checking for a Win - the Main Logic.mp4
            function checkWinStatus(selectedButtonId, player){
                console.log(selectedButtonId, player);
                var winCombination = [
                    [1,2,3],
                    [4,5,6],
                    [7,8,9],
                    [1,4,5],
                    [2,5,8],
                    [3,6,9],
                    [1,5,9],
                    [3,5,7],
                ];
            }
        });
        // console.log($(".customButton").val());
        // $('button').text('asdasd');
    </script>
  </body>
</html>