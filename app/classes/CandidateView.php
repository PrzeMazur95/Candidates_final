<?php 


class CandidateView extends CandidateModel{

    public function showAllCandidates(){

        $foundCandidates = $this->getAllCandidates();

        if($foundCandidates === false){

            $_SESSION['msg'] = "There are some problems with Db connection, please contact with admin";
            $_SESSION['msg_type'] = "danger";
            
        } else {

            foreach ($foundCandidates as $candidate){ ?>

                <tr>
                    <th scope='row'><?php echo $candidate['id'] ?></th>
                    <td><?php echo $candidate['name'] ?></td>
                    <td><?php echo $candidate['application_date'] ?></td>
                    <td>
                        <a href="editCandidateForm.php?editCandidate&id=<?php echo $candidate['id']; ?>" class='btn btn-outline-primary btn-sm'>Edit</a>
                        <a href="delete.php?deleteCandidate&id=<?php echo $candidate['id']; ?>" class='btn btn-outline-danger btn-sm' onclick="return confirm('Are you sure, you want to delete this Candidate?')">Delete</a>
                    </td>
                </tr>

            <?php }


        }

    }

    public function showSpecificCandidate($id){

        $candidate = $this->getCandidate($this->cleanInput($id));

        if($candidate === false){

            $_SESSION['msg']="There were some troubles with Db connection, contact with admin!";
            $_SESSION['msg_type']="danger";

        }else{

            return $candidate;

        }
        

    }

    function cleanInput($input){

        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
        
    }

}

?>