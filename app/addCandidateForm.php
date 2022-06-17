<!-- Page header-->
<?php require_once "header.php"; ?>
<!-- Page content-->
<div class="container">
    <div class="row mt-2">
        <h1 class="text-center">Add new Candidate!</h1>
        <div class="col-sm-5-7 mt-4 text-center">
            <!-- Show message, when there are some troubles, or candidate was succesfully added-->
            <?php
            if(isset($_SESSION['msg'])){ ?>

                <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                    <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']); 
                    ?>
                </div>

            <?php } ?>
            <!-- Form to add a new candidate-->
            <form action="add.php" method="POST">
                <div class="form-group">
                    <h2><label for="name">First name</label></h2>
                    <input type="text" class="form-control text-center" name="firstname" placeholder="John" required>
                </div>
                <div class="form-group">
                    <h2><label for="name">Last name</label></h2>
                    <input type="text" class="form-control text-center" name="lastname" placeholder="Doe" required>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                    <h2><label for="name">Age</label></h2>
                    <input type="number" class="form-control text-center" name="age" placeholder="25" required>
                </div>
                <div class="form-group col-sm-6">
                    <h2><label for="role">Role</label></h2>
                    <select class="form-select" name="role">
                    <option value="0" selected>Please choose a role for this candidate</option>
                    <?php 
                    
                    $options = new RoleView();
                    $options->showAllRoles();

                    ?>
                    </select>
                </div>
                </div>
                <div class="form-group">
                    <h4><label for="date">Date</label></h4>
                    <input type="date"  name="date" min="2022-06-16" max="2024-06-16" required></input>
                </div>
                <div class="form-group justify-content-center mt-4">
                    <button type="submit" name="submit" class="btn btn-outline-success">Add Candidate</button>
                </div>
            </form>
            <!-- End of add new candidate form-->
            <div class="row justify-content-center mt-4">
                <a href="index.php" class="btn btn-outline-secondary btn-sm">Back to main page</a>
            </div>
        </div>
    </div>
</div>
<!-- Page footer-->
<?php require_once "footer.php"; ?>
