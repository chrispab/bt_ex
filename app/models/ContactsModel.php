<?php
namespace App\Model;





class ContactsModel extends BaseModel
{
    public function getContacts($filters = array())
    {
        
        // $sql = "SELECT * FROM contacts";
        
        //clean form data recieved
        //better to do the cleaning in the contacts controller which use this model to get/update data
        //$filters['name']= $this->test_input($filters['name']); //! how to avoid text that would break the query?- restrict to a term that will work in sql query


        // if(isset($filters['name'])){
        //     $sql .= " WHERE CONCAT(first_name,' ',last_name) LIKE '%" . $filters['name'] . "%'";
        // }

        // $stmt = $this->pdo->query($sql);
        
        // return $stmt->fetchAll();
        
         
        $sql = "SELECT * FROM contacts";

        if (isset($filters['name'])) {
            $sql .= " WHERE CONCAT(first_name,' ',last_name) LIKE '%" . $filters['name'] . "%'";
        }
        
        if (isset($filters['active'])) {
            if ($filters['active'] == 'Active') {
                $sql .= " AND active = 1";
            }
            if ($filters['active'] == 'Inactive') {
                $sql .= " AND active = 0";
            }
        }

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }
    
    public function getContact($id)
    {
        
        //$sql = "SELECT * FROM contacts WHERE id = $id";
        $sql = "SELECT * FROM contacts WHERE id = :contactID";
        $stmt = $this->pdo->prepare($sql);
        //$stmt->bindParam(':contactID', $id);

        //$stmt = $this->pdo->query($sql);
        
        //return $stmt->fetch();
        $stmt->execute(array(":contactID" => $id));
        return $stmt->fetch();
    }
    
    public function getMembershipRenewals($contact_id)
    {
        // $sql = "SELECT date, package_id, club_id, end_date FROM membership_renewals WHERE contact_id = $contact_id";

        // $stmt = $this->pdo->query($sql);
        
        // return $stmt->fetchAll();

        $sql = "SELECT date, package_id, club_id, end_date FROM membership_renewals WHERE contact_id = :contactID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':contactID', $contact_id);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    
    public function updateContact($data)
    {
        $sql = 'UPDATE 
                    contacts
                SET
                    email = "'.$data['email'].'",
                    first_name = "'.$data['first_name'].'",
                    last_name = "'.$data['last_name'].'",
                    gender = "'.$data['gender'].'",
                    date_of_birth = "'.$data['date_of_birth'].'",
                    active = "'.$data['active'].'"
                WHERE
                    id = '.$data['id'];

        $stmt = $this->pdo->query($sql);
        
        return $stmt->rowCount();



        // $sql = 'UPDATE 
        //             contacts
        //         SET
        //             email = "'. :email .'",
        //             first_name = "'. :firstName.'",
        //             last_name = "'. :lastName .'",
        //             gender = "'. :gender .'",
        //             date_of_birth = "'. :dateOfBirth .'",
        //             active = "'. :active .'"
        //         WHERE
        //             id = '.$data['id'];
        // $sql = "SELECT date, package_id, club_id, end_date FROM membership_renewals WHERE contact_id = :contactID";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(':email', $contact_id);
        // $stmt->execute();
        // return $stmt->fetchAll();
    }

    // public function test_input($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
}
