<?php
$i=0;
$def[$i] = "";
$opt[$i] = "";
$ds_name[$i] = "Voltage";
foreach ($this->DS as $KEY=>$VAL) {
  if($VAL['NAME'] == 'voltage') {
    $opt[$i] .= "--vertical-label Volt --title \"Voltage for $hostname\" ";
    $def[$i] .= rrd::def  ("voltage", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
    $def[$i] .= rrd::area ("voltage", "#ADC7DB", "Voltage");
    $def[$i] .= rrd::line1("voltage", "#0000a8");
    $def[$i] .= rrd::gprint("voltage", "LAST",    "Last %2.2lf V");
    $def[$i] .= rrd::gprint("voltage", "MIN",     "\tMin %2.2lf V");
    $def[$i] .= rrd::gprint("voltage", "AVERAGE", "\tAverage %2.2lf V");
  }
}

foreach ($this->DS as $KEY=>$VAL) {
  if($VAL['NAME'] == 'temp') {
    $i++;
    $def[$i] = "";
    $opt[$i] = "";
    $ds_name[$i] = "Temperature Celsius";
    $color = '#e8b920';

    $opt[$i] .= "--vertical-label \"degrees Celsius\" --title \"Temperature for $hostname\" ";
    $def[$i] .= rrd::def('temp', $VAL['RRDFILE'], $VAL['DS'], 'AVERAGE', 'Temperature');
    $def[$i] .= rrd::gradient('temp', 'f2e7a5', 'f06f22', 'Temperature', 50);
    $def[$i] .= rrd::line1("temp", "#852b13");
    $def[$i] .= rrd::gprint("temp", "LAST",    "Last %2.2lf C");
    $def[$i] .= rrd::gprint("temp", "MAX",     "\tMax %2.2lf C");
    $def[$i] .= rrd::gprint("temp", "AVERAGE", "\tAverage %2.2lf C");
  }
}

foreach ($this->DS as $KEY=>$VAL) {
  if($VAL['NAME'] == 'power-consumption') {
    $i++;
    $def[$i] = "";
    $opt[$i] = "";
    $ds_name[$i] = "Power Consumption";
    $color = '#20E8B9';

    $opt[$i] .= "--vertical-label \"Watt\" --title \"Power consumption for $hostname\" ";
    $def[$i] .= rrd::def ('watt', $VAL['RRDFILE'], $VAL['DS'], 'AVERAGE');
    $def[$i] .= rrd::area('watt', $color, 'Power Consumption');
    $def[$i] .= rrd::gprint("watt", "LAST",    "Last %2.2lf W");
    $def[$i] .= rrd::gprint("watt", "MAX",     "\tMax %2.2lf W");
    $def[$i] .= rrd::gprint("watt", "AVERAGE", "\tAverage %2.2lf W");
  }
}

foreach ($this->DS as $KEY=>$VAL) {
  if($VAL['NAME'] == 'current') {
    $i++;
    $def[$i] = "";
    $opt[$i] = "";
    $ds_name[$i] = "Current";
    $color = '#555555';

    $opt[$i] .= "--vertical-label \"mA\" --title \"Current for $hostname\" ";
    $def[$i] .= rrd::def ('current', $VAL['RRDFILE'], $VAL['DS'], 'AVERAGE');
    $def[$i] .= rrd::area('current', $color, 'Current');
    $def[$i] .= rrd::gprint("current", "LAST",    "Last %4.0lf mA");
    $def[$i] .= rrd::gprint("current", "MAX",     "\tMax %4.0lf mA");
    $def[$i] .= rrd::gprint("current", "AVERAGE", "\tAverage %4.0lf mA");
  }
}
?>
