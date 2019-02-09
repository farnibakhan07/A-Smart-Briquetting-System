<?php
$sysdescr=(new SNMP(SNMP::VERSION_1,"10.22.10.55","public"))->get("1.1.3.6.1.4.1.13742.6.5.4.3.1.6.1.2.5");
print_r(sysdescr);
$session= new SNMP(SNMP::VERSION_1,"10.22.10.55","public");
$sysdescr=$session->get(array("1.3.6.1.2.1.2.2.1.10.10121","1.3.6.1.2.1.2.2.1.16.10121"));
print_r($sysdescr);
$session->close();

?>