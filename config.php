<?php

/*options for config file:

hard code institution? or default if none supplied?: TRUE
institution — provenance: NYU

WMS endpoint (public):
WMS endpoint (restricted):
WFS endpoint (public):
WFS endpoint (restricted):
geoserver_workspace:

Slug deriver with publisher prepend?
Use UUID parsing for handle, or just supply own?

web-accessible location of jeoQuery file:
web-accessible location of live query file:*/

$HardCodeInstitution_b = true;
$DefaultInstitution_b = true;
$Institution = "NYU";

$jeoQueryLoc = "";
$LiveQueryLoc = "";

$SlugPrependPublisher_b = true;

$UUIDParsing_b = true;

$GeoserverEndpointPublic = "http://52.1.104.201:8080/geoserver/nyu_sdr/";
$GeoserverEndpointRestricted = "http://52.1.104.201:8080/geoserver/nyu_sdr/";
$GeoserverWorkspacePublic = "nyu_sdr";
$GeoserverWorkspaceRestricted = "nyu_sdr";

/* Enable record production analytics for API requests handled by browse.php? */
$log_b = false;

/* Location of log for record analytics */
$speedlog = "/PATH/TO/YOUR/LOG.TXT";

/* E-mail the report in addition to saving to text? */
$email_b = false;

/* E-mail destination for analytic reports */
$email_me = "me@domain.net";










?>