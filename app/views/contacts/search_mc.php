<?php require_once '../app/views/includes/header.php';?>

<h3>Search Contacts</h3>

<?php if($data['messages']){ ?>
<div class="messages">
    <?php echo reset($data['messages']['update']); ?>
</div>
<?php } ?>

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
        <tr data-gender="<?php echo $contact['gender'];?>">
            <td><?php echo $contact['first_name'] . " " . $contact['last_name'];?></td>
            <td><?php echo $contact['email'];?></td>
            <td><?php echo $contact['active'] == '1' ? 'Yes' : 'No';?></td>
            <td><a href="/edit/<?php echo $contact['id'];?>" class="button button--red">Edit</a></td>
        </tr>
        <?php } ?>
    </tbody>    
</table>

</section>

<input name="step" type="hidden" value="1">
<button class="clickme">Click Me</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(".clickme").on("click", function(){
        $step = parseInt($('input[name="step"]').val());
        switch($step) {
            case 1:
                $('tr[data-gender="M"] td').css("text-decoration", "underline");
                break;
            case 2:
                $('tr[data-gender="M"] td:nth-child(2)').css("text-decoration", "none")
                break;
            case 3:
                $('tr[data-gender="M"]').remove();
                break;
        }
        $step++;
        $('input[name="step"]').val($step);
    }
    );
</script>

<?php require_once '../app/views/includes/footer.php';?> 