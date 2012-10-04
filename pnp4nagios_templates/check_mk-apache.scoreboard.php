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

$opt[$idx] = "--vertical-label 'Number' -u 10 -X0 --title \"Apache Requests on $hostname\" ";

$stats = array(
  array(1,  "wc", "Waiting for Connection", "   ", "#a6cee3", ""),
  array(2,  "su", "Starting up", "              ", "#1f78b4", "\\n"),
  array(3,  "rr", "Reading Request", "          ", "#b2df8a", ""),
  array(4,  "sr", "Sending Reply", "            ", "#33a02c", "\\n"),
  array(5,  "ka", "Keepalive", "                ", "#fb9a99", ""),
  array(6,  "dl", "DNS Lookup", "               ", "#e31a1c", "\\n"),
  array(7,  "cc", "Closing connection", "       ", "#fdbf6f", ""),
  array(8,  "lg", "Logging", "                  ", "#ff7f00", "\\n"),
  array(9,  "gf", "Gracefully finishing", "     ", "#cab2d6", ""),
  array(10, "ic", "Idle cleanup", "             ", "#6a3d9a", "\\n")
# Usually open slots are too many
#  array(11, "os", "Open slot", "                ", "#ffff99", "")
);

$def[$idx] = "";

foreach ($stats as $entry) {
   list($i, $stat, $name, $spaces, $color, $nl) = $entry;
   $def[$idx] .= "DEF:$stat=$RRDFILE[$i]:$DS[$i]:AVERAGE ";
   $def[$idx] .= "AREA:$stat$color:\"$name\":STACK ";
   $def[$idx] .= "GPRINT:$stat:LAST:\"$spaces%3.0lf$nl\" ";
}

$idx++;
$opt[$idx] = "--vertical-label 'Number' -u 10 -X0 --title \"Apache Requests on $hostname\" ";

$stats = array(
  array(1,  "wc", "Waiting for Connection", "   ", "#a6cee3", ""),
  array(2,  "su", "Starting up", "              ", "#1f78b4", "\\n"),
  array(3,  "rr", "Reading Request", "          ", "#b2df8a", ""),
  array(4,  "sr", "Sending Reply", "            ", "#33a02c", "\\n"),
  array(6,  "dl", "DNS Lookup", "               ", "#e31a1c", "\\n"),
  array(7,  "cc", "Closing connection", "       ", "#fdbf6f", ""),
  array(8,  "lg", "Logging", "                  ", "#ff7f00", "\\n"),
  array(9,  "gf", "Gracefully finishing", "     ", "#cab2d6", ""),
  array(10, "ic", "Idle cleanup", "             ", "#6a3d9a", "\\n")
# Usually open slots are too many
#  array(11, "os", "Open slot", "                ", "#ffff99", "")
);

$def[$idx] = "";

foreach ($stats as $entry) {
   list($i, $stat, $name, $spaces, $color, $nl) = $entry;
   $def[$idx] .= "DEF:$stat=$RRDFILE[$i]:$DS[$i]:AVERAGE ";
   $def[$idx] .= "AREA:$stat$color:\"$name\":STACK ";
   $def[$idx] .= "GPRINT:$stat:LAST:\"$spaces%3.0lf$nl\" ";
}

?>
