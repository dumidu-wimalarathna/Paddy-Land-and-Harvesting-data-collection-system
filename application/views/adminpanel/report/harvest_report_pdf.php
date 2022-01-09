<html><br><head>
<title>Harvesting Report</title>
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

<h3>Harvesting Report</h3>
    <table align="center" cellpadding = "5" border="1" width="1000px;">
<thead>
<tr>
<!-- <th>ID</th> -->
<th>District</th>
<th>Year</th>
<th>Cultivated Area</th>
<th>Type of Paddy</th>
<th>Season</th>
<th>Crop Damage</th>
<th>Volume of Harvested</th>
</tr>
</thead>
<tbody>
    <?php
        $oddeven_count = 0;
        foreach ($list_data as $rowlist) {
            // $recordid = $rowlist->ID;
            $year= $rowlist->year;
            $cultivated_area= $rowlist->cultivated_area;
            $paddy_type_name= $rowlist->paddy_type_name;
            $season_name= $rowlist->season_name;
            $crop_damage= $rowlist->crop_damage;
            $volume_of_harvested= $rowlist->volume_of_harvested;
            $district_name= $rowlist->district_name;
    ?>

<tr>
<!-- <td><?php echo $recordid; ?></td> -->
<td><?php echo $district_name; ?></td>
<td><?php echo $year; ?></td>
<td><?php echo $cultivated_area; ?></td>
<td><?php echo $paddy_type_name; ?></td>
<td><?php echo $season_name; ?></td>
<td><?php echo $crop_damage; ?></td>
<td><?php echo $volume_of_harvested; ?></td>
</tr>
<?php } ?>
</tbody>
    </table>

    <p style="font-size: 10px; text-align: center; padding-top: 15px;">COPYRIGHT ©2021 PADDY LAND AND HARVESTING DATA COLLECTION SYSTEM</p>

</body>
</html>

