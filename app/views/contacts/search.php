<?php require_once '../app/views/includes/header.php';?>

<!-- //! include csrf protection on pages
//!no security login required - Authentication
//!Cross Site Request Forgery
//! Prevention: Store a secret token in a hidden form field which is inaccessible from the 3rd party site.
//Properly escape any information you serve the user
re-validate the data in PHP as well too.  -->

<h3>Search Contacts</h3>

<?php if($data['messages']){ ?>
<div class="messages">
    <?php echo reset($data['messages']['update']); ?>
</div>
<?php } ?>

<button type="button" onclick="UnderlineRows()">Underline rows</button>
<button type="button" onclick="removeEmailUnderlines()">remove email Underlines</button>
<button type="button" onclick="hideRows()">hide rows</button>
<button type="button" onclick="advanceEffect()">Underline Males, de-underline email, remove rows </button>


<form class="form form--search-contacts">
    <div class="form__container">
        <input class="form__input" type="text" name="name" value="" placeholder="Contact name" style="flex-grow: 2">
     </div> 

    <div class="form__container">
        <label>Filter Active?</label>


        <input type="radio" name="active" value="None" checked>None<br>
        <input type="radio" name="active" value="Active">Active<br>
        <input type="radio" name="active" value="Inactive">Inactive
        <input class="form__submit" type="submit" value="Search">
    </div>

</form>

<table class="table table--contacts">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Active</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['contacts'] as $contact){ ?>
        <tr class="<?php echo ($contact['gender'] == 'M' ? 'Male' : 'Female'); ?>">
            <td><?php echo $contact['first_name'] . " " . $contact['last_name'];?></td>
            <td class="emailCell"><?php echo $contact['email'];?></td>
            <td><?php echo $contact['active'] == '1' ? 'Yes' : 'No';?></td>
            <td><a href="/edit/<?php echo $contact['id'];?>" class="button button--red">Edit</a></td>
        </tr>
        <?php } ?>
    </tbody>    
</table>

</section>

<script>
function UnderlineRows() {
    //setup a counter to track button presses - static var??
    //perform diff actions dep on 1st, 2nd or 3rd click
    
    
    // document.getElementsByClassName("Male").style.textDecoration = "underline";
    //document.getElementsByClassName("Male").[1].style.backgroundColor = "red";

    var x = document.getElementsByClassName("Male");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.textDecoration = "underline";
    }
}

function removeEmailUnderlines() {
    //setup a counter to track button presses - static var??
    //perform diff actions dep on 1st, 2nd or 3rd click
    
    
    // document.getElementsByClassName("Male").style.textDecoration = "underline";
    //document.getElementsByClassName("Male").[1].style.backgroundColor = "red";

    var x = document.getElementsByClassName("Male");// grab rows
    var i;
    for (i = 0; i < x.length; i++) {
        
        //x[i].children[3].style.textDecoration = "";
        //x[i].cells[1].style.textDecoration = "none";
        x[i].cells[1].style.backgroundColor = "red"; //!why?
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
            // code block
            alert("one");
            UnderlineRows();
            break;
        case 2:
            // code block
            alert("two");
            break;
        case 3:
            // code block
            alert("three");
            break;    
        default:
            // code block
    }
    //document.getElementById("myU").style.textDecoration = "underline";
    counter++;
}

</script>

<?php require_once '../app/views/includes/footer.php';?>