<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2012             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

#
# 2012-07-09 FLX f@qsol.ro
# 	- Adapted from Apache.CPU Usage: rq=1, idle=2, total
#
#

$idx = 1;
$opt[$idx] = "--vertical-label 'Apache Requests' -l0 --title \"Apache Requests for $hostname\" ";
$def[$idx] =  "DEF:user=$RRDFILE[2]:$DS[1]:AVERAGE " ;
$def[$idx] .= "DEF:system=$RRDFILE[1]:$DS[2]:AVERAGE " ;
$def[$idx] .= "CDEF:us=user,system,+ ";

$def[$idx] .= "AREA:system#ff6000:\"Requests\" " ;
$def[$idx] .= "GPRINT:system:LAST:\"%2.0lf\" " ;

$def[$idx] .= "AREA:user#60f020:\"Idle Workers\":STACK " ;
$def[$idx] .= "GPRINT:user:LAST:\"%2.0lf\" " ;

$def[$idx] .= "LINE:us#004080:\"Total\" " ;
$def[$idx] .= "GPRINT:us:LAST:\"%2.0lf\" " ;


?>
