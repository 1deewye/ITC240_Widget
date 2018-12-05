<?php
/*
    config.php
    
    Stores configuration data for our app
    
*/

ob_start();//prevents header errors

define('DEBUG',TRUE); #we want to see all errors

include 'credentials.php';//database credentials
define('THIS_PAGE',basename($_SERVER['PHP_SELF']) );

//here are the urls and page names for our main nav
$nav1['index.php'] = 'Home';
$nav1['template.php'] = 'Template';
    $nav1['db-test.php'] = 'DB Test';
    $nav1['customer_list.php'] = 'Customers';
    $nav1['daily.php'] = 'Dailies';
    $nav1['contact.php'] = 'Contact';

//echo 'the constant is storing: ' . THIS_PAGE;

//die;

//default page values
$title= THIS_PAGE;
$siteName= 'David\'s Wicked Cool Shiznit';
$slogan= 'Whatever it is you do, we do it better';
$pageHeader= 'The developer forgot to put a pageHeader';
$subHeader= 'The developer forgot to put a subHeader';

switch(THIS_PAGE){
    case 'template.php':
        $title= 'Put PageID here';
        $pageHeader= 'My template page';
        $subHeader= 'Put more info about page here';
    break;
        
    case 'index.php':
        $title= 'Home Page';
        $pageHeader= 'My home page';
        $subHeader= 'This is the home page';
    break;
        
    case 'customer_list.php':
        $title= 'A list of our customers';
        $pageHeader= 'Our customers';
        $subHeader= 'Don\'t sue us, because we\'re using celebrity photos!';
    break;
        
    case 'db_list.php':
        $title= 'Top 20 Games';
        $pageHeader= 'Best of the Best';
        $subHeader= 'PLAY STUFF';
    break;
        
    case 'daily.php':
        $title= 'My Daily page';
        $pageHeader= 'Daily Coffee Specials';
        $subHeader= 'All our coffee specials';
    break;
        
    case 'contact.php':
        $title= 'My contact page';
        $pageHeader= 'Please contact us';
        $subHeader= 'We appreciate your feedback';
    break;   
}






function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}

/*
makeLinks() will create navigation items from an array

echo makeLinks($nav1);

' . xxx . '

*/

function makeLinks($nav)
{
    $myReturn='';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key)
        {
            $myReturn .= '
           <li class="nav-item">
              <a class="nav-link active" href="' . $key . '">' . $value . '</a>
            </li>';
 
            
        }else{//add no formatting
            $myReturn .= ' 
        <li class="nav-item">
              <a class="nav-link" href="' . $key . '">' . $value . '</a>
            </li>';
            
        }
        
        
        
}
    return $myReturn;    
}//end makeLinks



