<?php include 'includes/config.php'?>
<?php
    
    /*
    
    if day is passed via GET, show $day's coffee
    
    if it's today, shows $today's coffee
    
    place a link to show today's coffee (if on another day)
    
    */
    

if(isset($_GET['day']))
{//if day is passed via GET, show $day's coffee
    $today = $_GET['day'];
}else{//if it's today, shows $today's coffee
    $today = date('l');
}



//$today = date('l');  
    
//echo $today;
//die;


switch($today){
        
    case 'Monday':
        $coffee= "Pumpkin Spice";
        $pic='pumpkin-spice-latte.jpg';
        $alt= 'yummy pumpkin spice';
        break;
        
    case 'Tuesday':
        $coffee= "White Mocha";
        $pic='white-mocha.jpg';
        $alt= 'tasty white mocha';
        break;
    
    case 'Wednesday':
        $coffee= "House Blend";
        $pic='coffee.jpg';
        $alt= 'clasic house blend';
        break;
        
    case 'Thursday':
        $coffee= "Americano";
        $pic='americano.jpg';
        $alt= 'yummy Americano';
        break;
    
    case 'Friday':
        $coffee= "Cappuccino";
        $pic='cappuccino.jpg';
        $alt= 'foamy cappuccino';
        break;
    
    case 'Saturday':
        $coffee= "Iced Coffee";
        $pic='iced-coffee.jpg';
        $alt= 'cool iced coffee';
        break;
    
    case 'Sunday':
        $coffee= "Double Espresso";
        $pic='double-espresso.jpg';
        $alt= 'shot of double espresso';
        break;
        
    
}


?>

<?php get_header()?>

<p> <?=$today?>'s special is <?=$coffee?>!</p>

<img src="images/<?=$pic?>" alt="<?=$alt?>" id="coffee" />

<p>Click below to find out what awesome flavors we have for each day of the week!</p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>

<?php get_footer()?>