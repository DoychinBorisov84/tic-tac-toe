$(function(){
    $(".customButton").on('click', function(){ 
        var humanSelectedButtonId = $(this).attr('id');
        if(!$(this).data('occupied')){
            $(this).addClass('btn-danger disabled');
            $(this).removeClass('btn-secondary');
            $(this).attr('data-occupied', 1);
            $(this).attr('data-player', 'human');
            $(this).text('X');
            
            // Temp disable the buttons
            disableButtons();

            // Check if we have win combinations
            gameOverStatus = checkWinStatus(humanSelectedButtonId, "human");

            if(!gameOverStatus){
                // Run the machine turn
                setTimeout(() => {
                    machineTurn();
                }, 2000); 
            }
        }
    });
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
        $(machineButtonClicked).attr('data-player', 'machine');

        // Re enable the buttons
        $('[data-occupied="0"]').each(function(){
            $(this).removeClass('disabled');
        })

        checkWinStatus(machineButtonClickedId, "machine");
    }
    
    function checkWinStatus(selectedButtonId, player){
        var status = false;
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

        //  Loop the win combinations with the passed selectedButton
        $.each(winCombination, function (indexInArray, winPositions) { 
            var winCount = 0; 
            // If we have the btn-id contained in the arr[] of combination-ids
            if($.inArray(selectedButtonId, winPositions)){
                $.each(winPositions, function(key, value){
                    var playerValue = $("#" + value).attr('data-player');
                    
                    // Check the assigned attr data-player => for the #btn clicked
                    if(playerValue == player){
                        winCount++;
                        if(winCount == 3){ 
                            status = true;
                            gameOver(player);
                        }
                    }
                });
            }
        });
        return status; 
    }

    function gameOver(player){
       disableButtons();

        if(player == 'human'){
            $('#result').html("<div class='text-center col-6 alert alert-success'>You Won !</div>");
        }else{
            $('#result').html("<div class='text-center col-6 alert alert-success'>You Lost !</div>");
        }
    }

    // Temp disable the buttons
     function disableButtons(){
         $('.customButton').each(function(){
            $(this).addClass('disabled');
        });
     }

    $("#reset-btn").on('click', function () {
        location.reload();
     });