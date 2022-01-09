<html><br><head>
<title>Land Report</title>
</head>
<body>
<style>
h3
{
font-family: "Open Sans",Arial,Helvetica,Sans-Serif; 
font-size: 18pt; 
font-style: normal; 
font-weight: bold; 
color:#000000;
text-align: center; 
}
p
{
font-family: "Open Sans",Arial,Helvetica,Sans-Serif; 
font-size: 12pt; 
font-style: normal; 
color:#000000;
text-align: center; 
}
table{
font-family: "Open Sans",Arial,Helvetica,Sans-Serif; 
color:black; 
font-size: 12pt; 
font-style: normal;
font-weight: bold;
text-align:left; 
border-collapse: collapse; 
}
.center {
    text-align: center;
}
.center img {
    display: block;
}
</style>

<?php
$path = 'assets/frontend/images/logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<div class="center">
    <img src="<?php echo $base64?>" width="117" height="161" style="display: block; margin-right: auto; margin-left: auto;"/>
    <h3 style="font-size: 30px; margin-top: 0px; margin-bottom: 0px;">PADDY LAND AND HARVESTING DATA COLLECTION SYSTEM</h3>
    <p style="margin-top: 10px;">Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is cultivated as a wetland crop in all the
districts in two cultivation seasons.</p>
</div>

<hr>
<h3>Land Report</h3>
    <table align="center" cellpadding = "5" border="1" width="1000px;">
<thead>
<tr>
<th>Province</th>
<th>District</th>
<th>City</th>
<th>Land Name</th>
<th>Owner Name</th>
<th>Extend</th>
<th>Telephone</th>
<th>NIC</th>
</tr>
</thead>
<tbody>
    <?php
        $oddeven_count = 0;
        foreach ($list_data as $rowlist) {
            // $recordid = $rowlist->ID;
            $province_name= $rowlist->province_name;
            $district_name= $rowlist->district_name;
            $city_name= $rowlist->city_name;
            $land_name= $rowlist->land_name;
            $first_name= $rowlist->first_name;
            $land_extend= $rowlist->land_extend;
            $telephone= $rowlist->telephone;
            $NIC= $rowlist->NIC;
    ?>

<tr>
<!-- <td><?php echo $recordid; ?></td> -->
<td><?php echo $province_name; ?></td>
<td><?php echo $district_name; ?></td>
<td><?php echo $city_name; ?></td>
<td><?php echo $land_name; ?></td>
<td><?php echo $first_name.' '.$rowlist->last_name; ?></td>
<td><?php echo $land_extend; ?></td>
<td><?php echo $telephone; ?></td>
<td><?php echo $NIC; ?></td>
</tr>
<?php } ?>
</tbody>
    </table>

    <p style="font-size: 10px; text-align: center; padding-top: 15px;">COPYRIGHT ©2021 PADDY LAND AND HARVESTING DATA COLLECTION SYSTEM</p>
    
</body>
</html>
