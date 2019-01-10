<?php
namespace App\Model;

class ContactsModel extends BaseModel {
    
    public function getContacts($filters = array()){
        
        // $sql = "SELECT * FROM contacts";
        
        // //clean form data recieved
        // //better to do the cleaning in the contacts controller which use this model to get/update data
        // //$filters['name']= $this->test_input($filters['name']); //! how to avoid text that would break the query?- restrict to a term that will work in sql query


        // if(isset($filters['name'])){
        //     $sql .= " WHERE CONCAT(first_name,' ',last_name) LIKE '%" . $filters['name'] . "%'";
        // }

        // $stmt = $this->pdo->query($sql);
        
        // return $stmt->fetchAll();       
        
         
        $sql = "SELECT * FROM contacts";

        if(isset($filters['name'])){
            $sql .= " WHERE CONCAT(first_name,' ',last_name) LIKE '%" . $filters['name'] . "%'";
        }
        
        if($filters['active'] == 'Y'){
            $sql .= " and active = 1";
        }
        
        if($filters['active'] == 'N'){
            $sql .= " and active = 0";
        }

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
               
    }
    
    public function getContact($id){
        
        //$sql = "SELECT * FROM contacts WHERE id = $id";
        $sql = "SELECT * FROM contacts WHERE id = :contactID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':contactID', $id);

        //$stmt = $this->pdo->query($sql);
        
        //return $stmt->fetch();
        $stmt->execute();
        return $stmt->fetch();

        
    }
    
    public function getMembershipRenewals($contact_id){
        
        $sql = "SELECT date, package_id, club_id, end_date FROM membership_renewals WHERE contact_id = $contact_id";

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
        
    }
    
    public function updateContact($data){

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
        
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
}
