<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ContactsController extends BaseController {
    
    public function search(Request $request, Response $response) {
        
        // declare the contacts model
        $model = $this->container->contactsModel;  
        
        // get the search data
        $filters = $request->getParams();
        
        // declare the contacts model
        $model = $this->container->contactsModel;  
        
        // search for all contacts that match the search criteria
        $data['contacts'] = $model->getContacts($filters);

        // log request
        $this->logger->info("Contact page");
        
        // get any flash messages
        $data['messages'] = $this->container->flash->getMessages();     

        // pass to the view
        return $this->view->render($response, 'contacts/search.php', $data);

    }
    
    public function edit(Request $request, Response $response, $args) {
        
        // declare the contacts model
        $model = $this->container->contactsModel;  
        
        // get the details for this contact
        $data['contact'] = $model->getContact($args['id']);
        $data['membership_renewals'] = $model->getMembershipRenewals($args['id']);
        
        // if the form has been submitted and there is post data
        if($request->getParsedBody()){
            
            // form validation is done by making the <input>'s required in the view
            
            // update the record
            $update = $model->updateContact($request->getParsedBody());
            
            // set flash message but only if the record has been changed in the database
            if($update >= 0){
                $this->container->flash->addMessage('update', "<strong>".$data['contact']['first_name'] . " " . $data['contact']['last_name'] . "'s</strong> record has been updated successfully!");
            }
            
            // redirect back to the search page
            return $response->withRedirect('/');

        }

        // log request
        $this->logger->info("Contact edit page");      

        // pass to the view
        return $this->view->render($response, 'contacts/edit.php', $data);

    }
    
}
