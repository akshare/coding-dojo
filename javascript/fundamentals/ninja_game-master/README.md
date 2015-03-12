Your job is to implement the following features.

1) Make the up and down arrow work (up would move the character up, down would move the character down). HINT: you can change the top coordinate by doing something like $('#character').css("left",x+"px").css("top", y+"px"); or even better pass an object like this: $('#character').css( { left: x, top: y });

2) We're going to set a boundary so the character can only stay within x of 0-500 and y of 0-500. Your goal is to draw this boundary and have the character only move within that region.

3) Change the character to a ninja that seems to walk (the images are stored in the img folder)

4) (optional) Throw support for another player (this player would just use the same keyboard/computer as the one you're using). Allow them to move with asdw (a for left, d for right, s for bottom, w for top)
