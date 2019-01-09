<?php
namespace App\Model;

class ContactsModel extends BaseModel {
    
    public function getContacts($filters = array()){
        
        $sql = "SELECT * FROM contacts";

        if(isset($filters['name'])){
            $sql .= " WHERE CONCAT(first_name,' ',last_name) LIKE '%" . $filters['name'] . "%'";
        }

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
        
    }
    
    public function getContact($id){
        
        $sql = "SELECT * FROM contacts WHERE id = $id";

        $stmt = $this->pdo->query($sql);
        
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
    
}
