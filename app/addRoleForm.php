<!-- Page header-->
<?php require_once "header.php"; ?>
<!-- Page content-->
<div class="container">
    <div class="row mt-2">
        <h1 class="text-center">Add new Role</h1>
        <div class="col-sm-5-7 mt-4 text-center">
            <!-- Show message, when there are some troubles, or role was succesfully added-->
            <?php
            if(isset($_SESSION['msg'])){ ?>

                <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                    <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']); 
                    ?>
                </div>

            <?php } ?>
            <!-- Form to add a new role-->
            <form action="addRole.php" method="POST">
                <div class="form-group">
                    <h2><label for="name">Name</label></h2>
                    <input type="text" class="form-control text-center" name="name" placeholder="Administrator" required>
                </div>
                <div class="form-group justify-content-center mt-4">
                    <button type="submit" name="submit" class="btn btn-outline-success">Add Role</button>
                </div>
            </form>
            <!-- End of add new role form-->
            <div class="row justify-content-center mt-4">
                <a href="index.php" class="btn btn-outline-secondary btn-sm">Back to main page</a>
            </div>
        </div>
    </div>
</div>
<!-- Page footer-->
<?php require_once "footer.php"; ?>
