<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php'?>
<?php get_header()?>

<?php
$sql = "select * from Top20Games";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Title: <b>' . $row['Title'] . '</b> ';
        echo 'Designer: <b>' . $row['Designer'] . '</b> ';
        echo 'AverageScore: <b>' . $row['AverageScore'] . '</b> ';
        echo 'Description: <b>' . $row['Description'] . '</b> ';
        
        echo '<a href="game_view.php?id=' . $row['GameID'] . '">' . $row['Title'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no games</p>';
}


//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>