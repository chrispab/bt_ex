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

<button type="button" onclick="changeRows()">Underline rows</button>
<button type="button" onclick="myFunction()">Set font Italic</button>
<button type="button" onclick="underline_text()">Set font Underline</button>


<form class="form form--search-contacts">
    <div class="form__container">
        <input class="form__input" type="text" name="name" value="" placeholder="Contact name" style="flex-grow: 2">
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
        <tr >
            <td class="changeMe" id="myU"><?php echo $contact['first_name'] . " " . $contact['last_name'];?></td>
            <td><?php echo $contact['email'];?></td>
            <td><?php echo $contact['active'] == '1' ? 'Yes' : 'No';?></td>
            <td><a href="/edit/<?php echo $contact['id'];?>" class="button button--red">Edit</a></td>
        </tr>
        <?php } ?>
    </tbody>    
</table>

</section>

<script>
function changeRows() {
    document.getElementsByClassName("changeMe").style.textDecorattion = "underline";
}

function myFunction() {
    document.getElementById("myU").style.fontStyle = "italic";
}
function underline_text(){
    document.getElementById("myU").style.textDecoration = "underline";
}

</script>

<?php require_once '../app/views/includes/footer.php';?>