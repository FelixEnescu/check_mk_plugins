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
$opt[$idx] = "--vertical-label 'Bytes' -b1024 -l0 --title \"Memcached Traffic for $hostname\" ";
$def[$idx] =  "DEF:read=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .= "DEF:write=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .= "CDEF:neg_write=write,-1,* ";

$def[$idx] .= "AREA:read#60f020:\"Bytes Read\" " ;
$def[$idx] .= "LINE:read#004080: " ;

$def[$idx] .= "GPRINT:read:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:read:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:read:MAX:\"%9.2lf%S max\\n\" ";

$def[$idx] .= "AREA:neg_write#ff6000:\"Bytes Written\" " ;
$def[$idx] .= "LINE:neg_write#004080: " ;

$def[$idx] .= "GPRINT:write:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:write:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:write:MAX:\"%9.2lf%S max\\n\" ";


?>
