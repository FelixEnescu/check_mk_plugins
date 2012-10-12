<?php



# age=37354s;86400;86400 time=0s;0;0

$idx = 1;
$opt[$idx] = "--vertical-label 'Age (d)' -l0  --title \"Backup Age\" ";
$def[$idx] =  "DEF:ag=$RRDFILE[1]:$DS[1]:MAX " ;
$def[$idx] .= "CDEF:first=ag,86400,/ ";

$def[$idx] .= "AREA:first#80f000:\"Age\" " ;
$def[$idx] .= "LINE:first#408000 " ;
$def[$idx] .= "GPRINT:first:LAST:\"%7.2lf %s last\" " ;
$def[$idx] .= "GPRINT:first:MAX:\"%7.2lf %s max\\n\" ";

$idx++;
$opt[$idx] = "--vertical-label 'Time (s)' -l0 --title \"Time\" ";
$def[$idx] = "DEF:third=$RRDFILE[2]:$DS[2]:MAX " ;

$def[$idx] .= "AREA:third#004080:\"Time\" " ;
$def[$idx] .= "LINE:third#206a0e " ;
$def[$idx] .= "GPRINT:third:LAST:\"%6.2lf %s s last\" " ;
$def[$idx] .= "GPRINT:third:AVERAGE:\"%6.2lf %s s avg\" " ;
$def[$idx] .= "GPRINT:third:MAX:\"%6.2lf %s s max\\n\" ";

?>
