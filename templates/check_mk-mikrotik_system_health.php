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
    $def[$i] .= "GPRINT:voltage:LAST:\"Last %2.2lf V\" ";
    $def[$i] .= "GPRINT:voltage:MAX:\"Max %2.2lf V\" ";
    $def[$i] .= "GPRINT:voltage:AVERAGE:\"Average %2.2lf V\" ";
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
    $def[$i] .= rrd::gradient('temp', 'eeeeee', 'e8b920', 'Temperature', 50);
    $def[$i] .= "GPRINT:temp:LAST:\"Last %2.2lf C\" ";
    $def[$i] .= "GPRINT:temp:MAX:\"Max %2.2lf C\" ";
    $def[$i] .= "GPRINT:temp:AVERAGE:\"Average %2.2lf C\" ";
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
    $def[$i] .= "GPRINT:watt:LAST:\"Last %2.2lf W\" ";
    $def[$i] .= "GPRINT:watt:MAX:\"Max %2.2lf W\" ";
    $def[$i] .= "GPRINT:watt:AVERAGE:\"Average %2.2lf W\" ";
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
    $def[$i] .= "GPRINT:current:LAST:\"Last %2.0lf mA\" ";
    $def[$i] .= "GPRINT:current:MAX:\"Max %2.0lf mA\" ";
    $def[$i] .= "GPRINT:current:AVERAGE:\"Average %2.0lf mA\" ";
  }
}
?>
