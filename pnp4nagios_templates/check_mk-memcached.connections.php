<?php

#
# 2012-07-09 FLX f@qsol.ro
# 	- Adapted from Apache.CPU Usage: rq=1, idle=2, total
#
#

$idx = 1;
$opt[$idx] = "--vertical-label 'Connections' -l0 --title \"Memcached Connections for $hostname\" ";
$def[$idx] =  "DEF:cons=$RRDFILE[1]:$DS[1]:AVERAGE " ;

$def[$idx] .= "AREA:cons#60f020:\"Connections\" " ;

$def[$idx] .= "GPRINT:cons:LAST:\"%6.2lf last\" " ;
$def[$idx] .= "GPRINT:cons:AVERAGE:\"%6.2lf avg\" " ;
$def[$idx] .= "GPRINT:cons:MAX:\"%6.2lf max\\n\" ";

#$def[$idx] .= "LINE:cons#004080:\" \" " ;
$def[$idx] .= "LINE:cons#004080" ;


?>
