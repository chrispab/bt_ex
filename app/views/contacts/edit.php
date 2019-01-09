<?php require_once '../app/views/includes/header.php';?>

<h3>Edit Contact</h3>
<!-- // !improve client side validation 
XSS escape HTML chars - don’t return HTML tags to the client. defending against HTML injection, and JS scripts -->

<form method="post" class="form form--edit-contact">
    
    <label for="email">Email:</label><input id="email" class="form__input" type="text" name="email" value="<?php echo $data['contact']['email'];?>" required><br>
    <label for="first_name">First Name:</label><input id="first_name" class="form__input" type="text" name="first_name" value="<?php echo $data['contact']['first_name'];?>" required><br>
    <label for="last_name">Last Name:</label><input id="last_name" class="form__input" type="text" name="last_name" value="<?php echo $data['contact']['last_name'];?>" required><br>
    <label for="gender">Gender:</label><input id="gender" class="form__input" type="text" name="gender" value="<?php echo $data['contact']['gender'];?>" required><br>
    <label for="date_of_birth">Date Of Birth:</label><input id="date_of_birth" class="form__input" type="text" name="date_of_birth" value="<?php echo $data['contact']['date_of_birth'];?>" required><br>
    <label for="phone_number">Phone Number:</label><input id="phone_number" class="form__input" type="text" name="phone_number" value="<?php echo $data['contact']['phone_number'];?>"><br>
    <label for="email">Active: </label><input id="active" class="form__input" type="text" name="active" value="<?php echo $data['contact']['active'];?>" required><br><br>
    <input type="hidden" name="id" value="<?php echo $data['contact']['id'];?>"> 
    <input class="form__submit" type="submit" value="Submit">
   <!-- //! consider dispalying as yes/no to match with serah page display of <datagrid></datagrid>  -->
    
</form>

<div class="membership">
    
    <h3>Membership Renewals</h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Package ID</th>
                <th>Club ID</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data['membership_renewals'] as $r){?>
            <tr>
                <td><?php echo $r['date'];?></td>
                <td><?php echo $r['package_id'];?></td>
                <td><?php echo $r['club_id'];?></td>
                <td><?php echo $r['end_date'];?><td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</div>

<?php require_once '../app/views/includes/footer.php';?>