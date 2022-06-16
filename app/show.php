<!-- Page header-->
<?php require_once "header.php"; ?>
<!-- Page content-->
<div class="container text-center">
    <!-- Show message, when there are some troubles with Db connection -->
    <?php
    if(isset($_SESSION['msg'])){ ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']); 
            ?>
        </div>
    <?php } ?>
    <!-- All Candidates table -->
    <table class="table text-center">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Aplication date</th>
        <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
    <?php
        //Instantiate CandidateView class, and call showAllCandidates() method which shows Candidates in foreach loop as a table rows
        $results = new CandidateView();
        $results->showAllCandidates();
    ?>
    </tbody>
    </table>
    <!-- End of all Candidates table -->
    <div class="row justify-content-center">
        <a href="index.php" class="btn btn-outline-secondary btn-sm">Back to main page</a>
    </div>
</div>
<!-- Page footer-->
<?php require_once "footer.php"; ?>
