<?php
$request = ms_newowsrequestobj();

foreach ($_GET as $k=>$v) {
     $request->setParameter($k, $v);
}

$request->setParameter("VeRsIoN","1.0.0");
ms_ioinstallstdouttobuffer();
$oMap = ms_newMapobj("/home/sing20/public_html/proj1bonb/maps/template.map");

$new_layer =ms_newlayerobj($oMap);
$new_layer->set("type", MS_LAYER_POINT);
$new_layer->set("dump", 1);
$new_layer->set("status", 1);
$new_layer->set("name","buff");
$new_class = ms_newClassObj($new_layer);
$new_style = ms_newStyleObj($new_class);
$new_style-> color->setRGB(0, 0, 255);
$new_style->set("symbolname", "circle");
$new_style->set("size", 5);

$new_layer->setConnectionType(MS_POSTGIS);
$new_layer->set("connection","user=sing20 password=Blacklist1@$ dbname=d408 host=192.168.88.30");
$data="the_geom FROM (SELECT ST_Buffer(the_geom, 5000) as the_geom FROM hw) as foo using unique the_geom using srid=2236";
if($request -> getvaluebyname('buffer')) {
  $buffer = $request -> getvaluebyname('buffer');
  $data="the_geom FROM (SELECT ST_Buffer(the_geom, " . $buffer . ") as the_geom FROM hw) as foo using unique the_geom using srid=2236";
}

$new_layer->set("data",$data) ;

$oMap->owsdispatch($request);
$contenttype = ms_iostripstdoutbuffercontenttype();
if ($contenttype == 'image/png')
{
   header('Content-type: image/png');
   ms_iogetStdoutBufferBytes();
}
else
{
	$buffer = ms_iogetstdoutbufferstring();
	echo $buffer;
}
ms_ioresethandlers();
?>
