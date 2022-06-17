<!-- Page header-->
<?php require_once "header.php"; ?>
<?php 
//Checking, if edit button has been clicked on show.php page
if(isset($_GET['editCandidate'])){
//Checking, if there is id in URL set   
    if(isset($_GET['id'])){
        //Checking, if id is a number
        if(is_numeric($_GET['id'])){
            //Instantiate CandidateView to show specific Candidate to user
            $candidate = new CandidateView();
            $specificCandidate = $candidate->showSpecificCandidate($_GET['id']);
            //Add returned array to variables, which are shown for user in a form
            $firstAndLastNameArray = explode(" ", $specificCandidate[0]['name']);
            $firstName = $firstAndLastNameArray[0];
            $lastName = $firstAndLastNameArray[1];
            $age = $specificCandidate[0]['age'];
            $role = $specificCandidate[0]['role'];
            $date = $specificCandidate[0]['application_date'];
            $id = $specificCandidate[0]['id'];

        }else{

            $_SESSION['msg']="ID of your Candidate is not a number!";
            $_SESSION['msg_type']="danger";

        }

    }else {

        $_SESSION['msg']="There is no Candidate ID!";
        $_SESSION['msg_type']="danger";

    }

}else{

    $_SESSION['msg']="You have to chose which candidate you want to edit!";
    $_SESSION['msg_type']="danger";

}

?>
<!-- Page content-->
<div class="container">
    <div class="row mt-2">
        <h1 class="text-center">Edit Candidate</h1>
        <p class="text-center">Below you see actual informations</p>
        <div class="col-sm-5-7 mt-4 text-center">
            <!-- Show message, when there are some troubles, or edit was succesfully-->
            <?php
            if(isset($_SESSION['msg'])){ ?>

                <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                    <?php 
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']); 
                    ?>
                </div>

            <?php } ?>
            <!-- Form to edit specific candidate, with exisiting db values for specific candidate-->
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <h2><label for="name">First Name</label></h2>
                    <input type="text" class="form-control text-center" name="firstname" value="<?php echo $firstName ?>" placeholder="John" required>
                </div>
                <div class="form-group">
                    <h2><label for="name">Last Name</label></h2>
                    <input type="text" class="form-control text-center" name="lastname" value="<?php echo $lastName ?>" placeholder="John" required>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                <h2><label for="name">Age</label></h2>
                    <input type="number" class="form-control text-center" name="age" value="<?php echo $age ?>" placeholder="25" required>
                </div>
                <?php 
                
                $roles = new RoleView(); 
                $actual_role = $roles->showSpecificRole($role);
                $actual_role_name = $actual_role[0]['name'];
                
                ?>
                <div class="form-group col-sm-6">
                    <h2><label for="role">Role</label></h2>
                    <select class="form-select" name="role">
                    <option value="<?php echo $role ?>" selected><?php echo $actual_role_name;  ?></option>
                    <?php 
                    
                    $roles->showAllRoles();

                    ?>
                    </select>
                </div>
                </div>
                <div class="form-group">
                    <h4><label for="date">Date</label></h4>
                    <input class ="text-center" type="date"  name="date" min="2022-06-16" max="2024-06-16" value="<?php echo $date ?>" required></input>
                </div>
                <div class="form-group justify-content-center mt-4">
                    <button type="submit" name="submit" class="btn btn-outline-success">Update Candidate</button>
                </div>
                <input type="hidden" name="id" value=<?php echo $id; ?>>
            </form>
            <!-- End of edit candidate form-->
            <div class="row justify-content-center mt-4 mb-3">
                <a href="index.php" class="btn btn-outline-secondary btn-sm">Back to main page</a>
            </div>
        </div>
    </div>
</div>
<!-- Page footer-->
<?php require_once "footer.php"; ?>
