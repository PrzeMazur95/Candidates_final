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
                        <a href="edit.php?editCandidate&id=<?php echo $candidate['id']; ?>" class='btn btn-outline-primary btn-sm'>Edit</a>
                        <a href="delete.php?deleteCandidate&id=<?php echo $candidate['id']; ?>" class='btn btn-outline-danger btn-sm' onclick="return confirm('Are you sure, you want to delete this Candidate?')">Delete</a>
                    </td>
                </tr>

            <?php }


        }

    }

}

?>