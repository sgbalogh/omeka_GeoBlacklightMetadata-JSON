<?php

/*If set to true, records will all contain the Institution specified below for
"dct_provenance_s" */

$DefaultInstitution_b = true;
$Institution = "NYU";

/*GeoNames customizations; enter the WEB-ACCESSIBLE paths to the two necessary JS files,
and your GeoNames API username (please don't use mine!) */
$jeoQueryLoc = "http://52.1.104.201/js/jeoquery.js";
$LiveQueryLoc = "http://52.1.104.201/js/jquery.livequery.min.js";
$GeoNamesUserID = "sgbalogh";

/*Slug deriver with publisher prepend? */
$SlugPrependPublisher_b = true;

/*Use UUID parsing for handle, or just supply own? NOTE: UUID parsing only works for NYU
handle.net UUIDs –– this will use the slug (derived or provided by user) to infer the
URL of the .zip file for direct download from NYU FDA */
$UUIDParsing_b = true;
/*Insert link to direct download zip file (using slug that was provided or derived)?
NOTE: Only set this to true if you are using UUID parsing for NYU FDA identifiers! */
$DirectDownloadLink = true;

/*Endpoint URLs for GeoServer and GeoServer workspace names (which will directly prepend layerID) */
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

$HardCode_b = "test";

?>