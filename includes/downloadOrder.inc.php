<?php
include_once 'dbh.inc.php';

$sql = "SELECT * from orders WHERE order_id=?";
$stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL error";
} else {
    mysqli_stmt_bind_param($stmt, "s",$_GET['order_id']);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
}

$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$_GET[order_id].xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysqli_num_fields($result); $i++) {
    $property = mysqli_fetch_field($result);
    echo $property->name . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
while($row = mysqli_fetch_row($result))
{
    $schema_insert = "";
    for($j=0; $j<mysqli_num_fields($result);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}   
?>