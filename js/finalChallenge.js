/* Source of player Arrow Icon
    https://www.flaticon.com/free-icon/play-button_148733
 */
// Player character
class player
{
    constructor()
    {
        this.currentPos = 18;
        this.orientation = "R"; // R = right, U = up, D = Down, L = Left
    }
    setOrientation(x)
    {
        this.orientation = x;
    }
    getPos()
    {
        return this.currentPos;
    }
    turnLeft()
    {
        sleep(250);
        switch(this.orientation)
        {
            case "R":
                this.setOrientation("U");
                document.getElementById("player").src = "../images/playerArrowUp.png";
                break;
            case "U":
                this.setOrientation("L");
                document.getElementById("player").src = "../images/playerArrowLeft.png";
                break;
            case "L":
                this.setOrientation("D");
                document.getElementById("player").src = "../images/playerArrowDown.png";
                break;
            case "D":
                this.setOrientation("R");
                document.getElementById("player").src = "../images/playerArrowRight.png";
                break;
        }
    }
    turnRight()
    {
        sleep(250);
        switch(this.orientation)
        {
            case "R":
                this.setOrientation("D");
                document.getElementById("player").src = "../images/playerArrowDown.png";
                break;
            case "U":
                this.setOrientation("R");
                document.getElementById("player").src = "../images/playerArrowRight.png";
                break;
            case "L":
                this.setOrientation("U");
                document.getElementById("player").src = "../images/playerArrowUp.png";
                break;
            case "D":
                this.setOrientation("L");
                document.getElementById("player").src = "../images/playerArrowLeft.png";
                break;
        }
    }
    moveForward(x)
    {
        for(var i = 0; i < x; i++)
        {
            sleep(250);
            if(this.orientation === "R") // Moving Rightward
            {
                if (map[this.currentPos + 1] === 1) {
                    document.getElementById("player").className += " error";
                    // Now since the player is in a wall, return false and stop moving
                    document.getElementById("resultsBox").innerHTML = "Game Lost! <br> You hit a wall!";
                    defeat = true;
                }
                else {
                    this.currentPos++;
                    // Delete old player model
                    var old = document.getElementById("player");
                    old.parentNode.removeChild(old);
                    // Generate new player at position
                    var newPlayer = document.createElement('img');
                    newPlayer.id = "player";
                    newPlayer.src = '../images/playerArrowRight.png';
                    document.getElementById("tile" + this.getPos()).appendChild(newPlayer);
                    if(map[this.currentPos] === 2) {
                        console.log("WIN!")
                        victory = true;
                        document.getElementById("resultsBox").innerHTML = "Victory!";
                    }
                }
            }
            if(this.orientation === "U") // Moving Upward
            {
                if (map[this.currentPos - 6] === 1) {
                    document.getElementById("player").className += " error";
                    // Now since the player is in a wall, return false and stop moving
                    document.getElementById("resultsBox").innerHTML = "Game Lost! <br> You hit a wall!";
                    defeat = true;
                }
                else {
                    this.currentPos -= 6;
                    // Delete old player model
                    var old = document.getElementById("player");
                    old.parentNode.removeChild(old);
                    // Generate new player at position
                    var newPlayer = document.createElement('img');
                    newPlayer.id = "player";
                    newPlayer.src = '../images/playerArrowUp.png';
                    document.getElementById("tile" + this.getPos()).appendChild(newPlayer);
                    if(map[this.currentPos] === 2) {
                        console.log("WIN!")
                        victory = true;
                        document.getElementById("resultsBox").innerHTML = "Victory!";
                    }
                }
            }
            if(this.orientation === "D") // Moving Downward
            {
                if (map[this.currentPos + 6] === 1) {
                    document.getElementById("player").className += " error";
                    // Now since the player is in a wall, return false and stop moving
                    document.getElementById("resultsBox").innerHTML = "Game Lost! <br> You hit a wall!";
                    defeat = true;
                }
                else {
                    this.currentPos += 6;
                    // Delete old player model
                    var old = document.getElementById("player");
                    old.parentNode.removeChild(old);
                    // Generate new player at position
                    var newPlayer = document.createElement('img');
                    newPlayer.id = "player";
                    newPlayer.src = '../images/playerArrowDown.png';
                    document.getElementById("tile" + this.getPos()).appendChild(newPlayer);
                    if(map[this.currentPos] === 2) {
                        console.log("WIN!")
                        victory = true;
                        document.getElementById("resultsBox").innerHTML = "Victory!";
                    }
                }
            }
            if(this.orientation === "L") // Moving Leftward
            {
                if (map[this.currentPos - 1] === 1) {
                    document.getElementById("player").className += " error";
                    // Now since the player is in a wall, return false and stop moving
                    document.getElementById("resultsBox").innerHTML = "Game Lost! <br> You hit a wall!";
                    defeat = true;
                }
                else {
                    this.currentPos--;
                    // Delete old player model
                    var old = document.getElementById("player");
                    old.parentNode.removeChild(old);
                    // Generate new player at position
                    var newPlayer = document.createElement('img');
                    newPlayer.id = "player";
                    newPlayer.src = '../images/playerArrowLeft.png';
                    document.getElementById("tile" + thePlayer.getPos()).appendChild(newPlayer);
                    if(map[this.currentPos] === 2) {
                        console.log("WIN!")
                        victory = true;
                        document.getElementById("resultsBox").innerHTML = "Victory!";
                    }
                }
            }
        }
        return true;
    }
    checkFront()
    {
        if(this.orientation === "R")
        {
            if(map[this.currentPos + 1] === 1)
            {
                return true;
            }
        }
        else if(this.orientation === "U")
        {
            if(map[this.currentPos - 6] === 1)
            {
                return true;
            }
        }
        else if(this.orientation === "D")
        {
            if(map[this.currentPos + 6] === 1)
            {
                return true;
            }
        }
        else if(this.orientation === "L")
        {
            if(map[this.currentPos - 1] === 1)
            {
                return true;
            }
        }
        return false;
    }
}
// Create player object
var thePlayer = new player();

// 2 Denotes Finish, 1 Denotes wall, 0 denotes no wall
var map =
[
    1, 1, 1, 1, 1, 1,
    1, 0, 0, 0, 1, 1,
    1, 0, 1, 0, 1, 1,
    0, 0, 1, 0, 0, 2,
    1, 1, 1, 1, 1, 1,
];
// Generate the map on screen
for(var coordinate in map) {
    var newElement = document.createElement('div');
    if(map[coordinate] === 1) // Wall element
    {
        newElement.id = "tile" + coordinate;
        newElement.className = "wallTile";
    }
    else if(map[coordinate] === 0)
    {
        newElement.id = "tile" + coordinate;
        newElement.className = "groundTile";
    }
    else if(map[coordinate] === 2)
    {
        newElement.id = "tile" + coordinate;
        newElement.className = "finishTile";
    }
    document.getElementById("challengeWindow").appendChild(newElement);
}

// Now add the player element inside the starting coordinate
var newPlayer = document.createElement('img');
newPlayer.id = "player";
newPlayer.src = '../images/playerArrowRight.png';
document.getElementById("tile" + thePlayer.getPos()).appendChild(newPlayer);

// Sleep Function
function sleep(milliseconds)
{
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++)
    {
        if ((new Date().getTime() - start) > milliseconds)
        {
            break;
        }
    }
}

// Game in Progress trackers
victory = false;
defeat = false;

// Now begin manipulation functions.
turnLeft = function()
{
    if(!defeat && !victory)
    {
        if (thePlayer.checkFront()) {
            thePlayer.turnLeft();
        }
    }
}

turnRight = function()
{
    if(!defeat && !victory)
    {
        if (thePlayer.checkFront()) {
            thePlayer.turnRight();
        }
    }
}

moveForward = function(x)
{
    document.getElementById("player").remove("error");
    thePlayer.moveForward(x);
}

forLoop = function()
{
    if(!defeat && !victory)
    {
        thePlayer.moveForward(2);
    }
}

whileLoop = function()
{
    if(!defeat && !victory)
    {
        while(!thePlayer.checkFront()) {
            thePlayer.moveForward(1);
        }
    }
}