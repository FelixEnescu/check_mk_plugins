<?php

#
# 2012-07-09 FLX f@qsol.ro
# 	- Adapted from Apache.CPU Usage: rq=1, idle=2, total
#
#

# -b1024 : base unit, use to scale memory. For traffic measurement, 1 kb/s is 1000 b/s.
# -X6    : sets the 10**exponent scaling of the y-axis values
# -l0    : lower-limit value
#$opt[$idx] = "--vertical-label MBytes/s -b1024 -X6 -l0 --title \"Apache Traffic\" ";


$idx = 1;
$opt[$idx] = "--vertical-label 'Bytes' -b1024 -X9 -l0 --title \"Memcached Cache Usage for $hostname\" ";
$def[$idx] =  "DEF:used=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .=  "DEF:total=$RRDFILE[2]:$DS[2]:AVERAGE " ;

$def[$idx] .= "AREA:used#60f020:\"Bytes Used\" " ;

$def[$idx] .= "GPRINT:used:LAST:\"%6.2lf%S last\" " ;
$def[$idx] .= "GPRINT:used:AVERAGE:\"%6.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:used:MAX:\"%6.2lf%S max\\n\" ";

#$def[$idx] .= "LINE:cons#004080:\" \" " ;
$def[$idx] .= "LINE:used#004080 " ;

$def[$idx] .= "LINE:total#004080:\"Limit\" " ;
$def[$idx] .= "GPRINT:total:AVERAGE:\"%6.2lf%S \\n\" " ;


$idx++;
$opt[$idx] = "--vertical-label 'Items' -b1000 -X6 -l0 --title \"Memcached Current Items for $hostname\" ";
$def[$idx] =  "DEF:cons=$RRDFILE[3]:$DS[3]:AVERAGE " ;

$def[$idx] .= "AREA:cons#ff6000:\"Connections\" " ;

$def[$idx] .= "GPRINT:cons:LAST:\"%6.2lf%S last\" " ;
$def[$idx] .= "GPRINT:cons:AVERAGE:\"%6.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:cons:MAX:\"%6.2lf%S max\\n\" ";

#$def[$idx] .= "LINE:cons#004080:\" \" " ;
$def[$idx] .= "LINE:cons#004080" ;


?>
