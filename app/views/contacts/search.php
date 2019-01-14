<?php require_once '../app/views/includes/header.php';?>

<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>

<script type="text/javascript" src="../js/myLib.js"></script>

<!-- //! include csrf protection on pages
//!no security login required - Authentication
//!Cross Site Request Forgery
//! Prevention: Store a secret token in a hidden form field which is inaccessible from the 3rd party site.
//Properly escape any information you serve the user
re-validate the data in PHP as well too.  -->

<h3>Search Contacts</h3>

<?php if ($data['messages']) {
    ?>
<div class="messages">
    <?php echo reset($data['messages']['update']); ?>
</div>
<?php
} ?>

<!-- <button type="button" onclick="UnderlineRows()">Underline rows</button>
<button type="button" onclick="removeEmailUnderlines()">remove email Underlines</button>
<button type="button" onclick="hideRows()">hide rows</button> -->


<form class="form form--search-contacts">
<div class="form__container">
        <label>Filter Active?</label>
        <select name="active">
            <option value="None">None</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select> 


        <div class="form__container">
        <input class="form__input" type="text" name="name" value="" placeholder="Contact name" style="flex-grow: 2">
</div> 
        <input class="form__submit" type="submit" value="Search">
    </div>




     <button type="button" onclick="advanceEffect()">Underline Males, de-underline email, remove rows </button>

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
        <?php foreach ($data['contacts'] as $contact) {
        ?>
        <tr class="<?php echo($contact['gender'] == 'M' ? 'Male' : 'Female'); ?>">
            <td><?php echo $contact['first_name'] . " " . $contact['last_name']; ?></td>
            <td class="emailCell"><?php echo $contact['email']; ?></td>
            <td><?php echo $contact['active'] == '1' ? 'Yes' : 'No'; ?></td>
            <td><a href="/edit/<?php echo $contact['id']; ?>" class="button button--red">Edit</a></td>
        </tr>
        <?php
    } ?>
    </tbody>    
</table>

</section>



<?php require_once '../app/views/includes/footer.php';?>