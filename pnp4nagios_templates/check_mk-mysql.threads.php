<?php

# check_mk-mysql.threads.php
#
# PNP4Nagios Template for MySQL Threads
#
# 2012-09-29 FLX f@qsol.ro
# 	- Adapted from check_mk-apache.requests.php
#
#


$idx = 1;
$opt[$idx] = "--vertical-label Threads -l0  --title \"MySQL Threads on $hostname\" ";

$def[$idx]  = "DEF:run=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .= "DEF:conn=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .= "DEF:cache=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$idx] .= "CDEF:total=run,conn,+ ";

$def[$idx] .= "AREA:conn#60f020:\"Connected\" " ;
$def[$idx] .= "GPRINT:conn:LAST:\"%2.0lf\" " ;

$def[$idx] .= "AREA:run#ff6000:\"Running\" " ;
$def[$idx] .= "GPRINT:run:LAST:\"%2.0lf last\" " ;

$def[$idx] .= "GPRINT:run:AVERAGE:\"%2.0lf avg\" " ;
$def[$idx] .= "GPRINT:run:MAX:\"%2.0lf max\\n\" ";

$def[$idx] .= "LINE:conn#004080: " ;


$idx++;
$opt[$idx] = "--vertical-label Threads -l0 --title \"MySQL Cached Threads on $hostname\" ";

$def[$idx]  = "DEF:run=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$idx] .= "DEF:conn=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$idx] .= "DEF:cache=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$idx] .= "CDEF:total=cache,conn,+ ";
$def[$idx] .= "CDEF:crun=conn,run,- ";

$def[$idx] .= "AREA:cache#00b0c0:\"Cached\" " ;
$def[$idx] .= "GPRINT:cache:LAST:\"%2.0lf\" " ;

$def[$idx] .= "AREA:run#ff6000:\"Running\":STACK " ;
$def[$idx] .= "GPRINT:run:LAST:\"%2.0lf\" " ;

$def[$idx] .= "AREA:crun#60f020:\"Connected\":STACK " ;
$def[$idx] .= "GPRINT:conn:LAST:\"%2.0lf\" " ;

$def[$idx] .= "LINE:total#004080:\"Total\" " ;
$def[$idx] .= "GPRINT:total:LAST:\"%2.0lf\" " ;


$idx++;
$opt[$idx] = "--vertical-label Threads -l0 --title \"MySQL Created Threads on $hostname\" ";

$def[$idx]  = "DEF:created=$RRDFILE[4]:$DS[4]:AVERAGE " ;

$def[$idx] .= "AREA:created#65ab0e:\"Created\" " ;
$def[$idx] .= "LINE:created#206a0e " ;
$def[$idx] .= "GPRINT:created:LAST:\"%6.2lf%s last\" " ;
$def[$idx] .= "GPRINT:created:AVERAGE:\"%6.2lf%s avg\" " ;
$def[$idx] .= "GPRINT:created:MAX:\"%6.2lf%s max\\n\" ";


?>
