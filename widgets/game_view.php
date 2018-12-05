<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:game_list.php');
}


$sql = "select * from Top20Games where GameID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Title = stripslashes($row['Title']);
        $Designer = stripslashes($row['Designer']);
        $AverageScore = stripslashes($row['AverageScore']);
        $Description = stripslashes($row['Description']);
        $title = "Title Page for " . $Title;
        $slogan = $Title;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This game does not exist</p>';
}

?>
<?php get_header()?>

<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Title: <b>' . $Title . '</b> ';
    echo 'Designer: <b>' . $Designer . '</b> ';
    echo 'AverageScore: <b>' . $AverageScore . '</b> ';
    echo 'Description: <b>' . $Description . '</b> ';
    
    echo '<img src="boardgames/game' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="game_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>