function UnderlineRows() {
    //setup a counter to track button presses - static var??
    //perform diff actions dep on 1st, 2nd or 3rd click
    
    
    // document.getElementsByClassName("Male").style.textDecoration = "underline";
    //document.getElementsByClassName("Male").[1].style.backgroundColor = "red";

    var x = document.getElementsByClassName("Male");// gets the whole row, but only set underlined on sub cells - as row underline would override cell underlines

    var i;
    for (i = 0; i < x.length; i++) {
        for (let index = 0; index < 4; index++) {
           
            x[i].cells[index].style.textDecoration = "underline";
        }
        
    }
}

function removeEmailUnderlines() {
    //setup a counter to track button presses - static var??
    //perform diff actions dep on 1st, 2nd or 3rd click
    
    
    // document.getElementsByClassName("Male").style.textDecoration = "underline";
    //document.getElementsByClassName("Male").[1].style.backgroundColor = "red";

    //locate the rows with 'Male class
    //then locate the cells of that row with class 'emailCell'
    var x = document.getElementsByClassName("Male");// grab rows
    var i;
    for (i = 0; i < x.length; i++) {
        
        //x[i].children[3].style.textDecoration = "";
        x[i].cells[1].style.textDecoration = "none";
        //x[i].cells[1].style.backgroundColor = "red"; //!why?
    }
}

function hideRows() {
    var x = document.getElementsByClassName("Male");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
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

