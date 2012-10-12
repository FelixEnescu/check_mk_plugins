<?php



# hosts=1;1;1 servers=1;1;1 time=3s;;

$idx = 1;
$opt[$idx] = "--vertical-label Hosts -l0  --title \"Hosts Blacklisted\" ";
$def[$idx] =  "DEF:first=$RRDFILE[1]:$DS[1]:AVERAGE " ;

$def[$idx] .= "AREA:first#6890a0:\"Hosts\" " ;
$def[$idx] .= "LINE:first#2060a0 " ;
$def[$idx] .= "GPRINT:first:LAST:\"%6.2lf last\" " ;
$def[$idx] .= "GPRINT:first:AVERAGE:\"%6.2lf avg\" " ;
$def[$idx] .= "GPRINT:first:MAX:\"%6.2lf max\\n\" ";


$idx++;
$opt[$idx] = "--vertical-label RBLs -l0 --title \"RBL Blacklisting\" ";
$def[$idx] = "DEF:second=$RRDFILE[2]:$DS[2]:AVERAGE " ;

$def[$idx] .= "AREA:second#65ab0e:\"RBLs\" " ;
$def[$idx] .= "LINE:second#206a0e " ;
$def[$idx] .= "GPRINT:second:LAST:\"%6.2lf%s last\" " ;
$def[$idx] .= "GPRINT:second:AVERAGE:\"%6.2lf%s avg\" " ;
$def[$idx] .= "GPRINT:second:MAX:\"%6.2lf%s max\\n\" ";


$idx++;
$opt[$idx] = "--vertical-label Time -l0 --title \"Time\" ";
$def[$idx] = "DEF:third=$RRDFILE[3]:$DS[3]:AVERAGE " ;

$def[$idx] .= "AREA:third#004080:\"Time\" " ;
$def[$idx] .= "LINE:third#206a0e " ;
$def[$idx] .= "GPRINT:third:LAST:\"%6.2lf%s last\" " ;
$def[$idx] .= "GPRINT:third:AVERAGE:\"%6.2lf%s avg\" " ;
$def[$idx] .= "GPRINT:third:MAX:\"%6.2lf%s max\\n\" ";

?>
