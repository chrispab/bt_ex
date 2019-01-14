    //setup a counter to track button presses - static var??
    //perform diff actions dep on 1st, 2nd or 3rd click
    
function UnderlineRows() {
    //var x = document.getElementsByClassName("Male");// gets the whole row, but only set underlined on sub cells - as row underline would override cell underlines
    var x = $(".Male"); 
    var i;
    for (i = 0; i < x.length; i++) {
        for (let index = 0; index < 4; index++) {           
            x[i].cells[index].style.textDecoration = "underline";
        }
        
    }
}

function removeEmailUnderlines() {
    //locate the rows with 'Male class
    //then locate the cells of that row with class 'emailCell'
//    var x = document.getElementsByClassName("Male");// grab rows
    var x = $(".Male"); 

    var i;
    for (i = 0; i < x.length; i++) {
        x[i].cells[1].style.textDecoration = "none";
    }
}

function hideRows() {
//    var x = document.getElementsByClassName("Male");
    var x = $(".Male"); //get all elemnts with class Male

    var i;
    for (i = 0; i < x.length; i++) {
        //x[i].style.display = "none";
        x.hide();
    }
}


var counter = 1;
function advanceEffect(){
    switch(counter) {
        case 1:
            UnderlineRows();
            break;
        case 2:
            removeEmailUnderlines();
            break;
        case 3:
            hideRows();
            break;    
        default:
    }
    counter++;
}

