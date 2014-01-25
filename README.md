# emaildirect
===========

A php library which implements the complete functionality of the REST [Email Direct API](https://docs.emaildirect.com).

## Installation

### Composer install
add package to require section
    
    require: "maxlapko/emaildirect": "dev-master"

composer update
    
### Plain install
Download package code

require_once 'EmailDirect.php';
EmailDirect::register(true);

## Examples

### Retrieve a list of all your publications.

    $apiKey = '...';
    $emailDirect = new EmailDirect($apiKey);
    $response = $emailDirect->publications()->all();
    // the respone instance of EmailDirect_Response class, it has ArrayAccess interface
    if ($response->success()) {
        $data = $response->getData(); // return array
        // or $publications = $response->Publications; return all publications as array
        foreach ($data['Publications'] as $publication) {
            echo $publication['PublicationID'] . ': ' . $publication['Name'] . PHP_EOL;
        }
    } else {
        echo $response->getErrorMessage();
    }

Results in:
    
    1: Publication One
    2: Publication Two

### Retrieve a creative list.

    $creatives = $emailDirect->creatives();
    if ($creatives->all()->Items as $creative) {
        $details = $creatives->setId($creative['CreativeID'])->details();
        echo $details->HTML;
    }
    

### Create, then remove a Publication
    
    $response = $emailDirect->publications()->create('Test', array('Description' => 'Test Publication'));
    if ($response->success()) {
        $data = $response->getData();
        $emailDirect->publications($data['PublicationID'])->delete();
    }

### Updating a subscriber's custom fields
    
    $emailDirect->subscribers('email@email.com').update(array('Publications' => array(3)));

When creating a subscriber
    
    $response = $emailDirect->subscribers->create($email, array(
        'Publications' => array(1), 
        'CustomFields' => array('FirstName' => 'Max', 'LastName' => 'Lapko')
    ));


## Credits
- Max Lapko