let the_int = Math.floor(Math.random() * 6) + 1 //the + 1 makes it so its not 0.;
let the_background = document.querySelector(".background");
// console.log(the_int);
// console.log(the_background);
switch (the_int) {
    case 1:
        the_background.classList.add('litterature');
        break;
    case 2:
        the_background.classList.add('geography');
        break;
    case 3:
        the_background.classList.add('history');
        break;
    case 4:
        the_background.classList.add('entertainement');
        break;
    case 5:
        the_background.classList.add('sports');
        break;
    case 6:
        the_background.classList.add('science');
        break;
  }