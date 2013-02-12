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
$opt[$idx] = "--vertical-label 'Pages' -l0 --title \"Pages printed on $hostname\" ";
$def[$idx] =  "DEF:read=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .=  "DEF:minread=$RRDFILE[1]:$DS[1]:MIN " ;
$def[$idx] .=  "DEF:maxread=$RRDFILE[1]:$DS[1]:MAX " ;
$def[$idx] .= "CDEF:print=maxread,minread,- ";

$def[$idx] .= "AREA:read#60f020:\"Pages Printed\" " ;
$def[$idx] .= "LINE:read#004080: " ;

$def[$idx] .= "GPRINT:minread:MIN:\"%9.0lf Start\" " ;
$def[$idx] .= "GPRINT:maxread:MAX:\"%9.0lf End\" " ;
$def[$idx] .= "GPRINT:print:MAX:\"%9.0lf Printed\\n\" ";


?>
