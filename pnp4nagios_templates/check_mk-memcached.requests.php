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
$opt[$idx] = "--vertical-label 'Requests' -b1000 -l0 --title \"Memcached Requests for $hostname\" ";
$def[$idx] =  "DEF:get=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .=  "DEF:set=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .=  "DEF:misses=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$idx] .=  "DEF:hits=$RRDFILE[4]:$DS[4]:AVERAGE " ;
$def[$idx] .= "CDEF:total=get,set,+ ";

$def[$idx] .= "AREA:set#ff6000:\"Cmd Sets\" " ;

$def[$idx] .= "GPRINT:set:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:set:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:set:MAX:\"%9.2lf%S max\\n\" ";

$def[$idx] .= "AREA:get#60f020:\"Cmd Gets\":STACK " ;

$def[$idx] .= "GPRINT:get:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:get:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:get:MAX:\"%9.2lf%S max\\n\" ";

$def[$idx] .= "LINE:total#004080:\"Total   \" " ;
$def[$idx] .= "GPRINT:total:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:total:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:total:MAX:\"%9.2lf%S max\\n\" ";

$def[$idx] .= "LINE:misses#ff0000:\"Misses  \" " ;
$def[$idx] .= "GPRINT:misses:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:misses:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:misses:MAX:\"%9.2lf%S max\\n\" ";

$def[$idx] .= "LINE:hits#0000ff:\"Hits    \" " ;
$def[$idx] .= "GPRINT:hits:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:hits:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:hits:MAX:\"%9.2lf%S max\\n\" ";

$idx++;
$opt[$idx] = "--vertical-label '%' -b1000 -l0 --title \"Memcached Hit Ratio for $hostname\" ";
$def[$idx] =  "DEF:get=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .=  "DEF:set=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .=  "DEF:misses=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$idx] .=  "DEF:hits=$RRDFILE[4]:$DS[4]:AVERAGE " ;
#$def[$idx] .= "CDEF:ratio=hits,get,/,100,* ";
$def[$idx] .= "CDEF:ratio=hits,hits,misses,+,/,100,* ";
$def[$idx] .= "CDEF:1ratio=100,ratio,- ";


$def[$idx] .= "AREA:ratio#60f020:\"Ratio    \" " ;
$def[$idx] .= "LINE:ratio#004080: " ;
$def[$idx] .= "AREA:1ratio#ff6000::STACK " ;
$def[$idx] .= "LINE:100#004080: " ;

$def[$idx] .= "GPRINT:ratio:LAST:\"%9.2lf%S last\" " ;
$def[$idx] .= "GPRINT:ratio:AVERAGE:\"%9.2lf%S avg\" " ;
$def[$idx] .= "GPRINT:ratio:MAX:\"%9.2lf%S max\\n\" ";

?>
