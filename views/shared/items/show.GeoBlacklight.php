<?php /* REQUIRES PHP 5.2 OR LATER, on account of json_encode() function. */ ?>
<?php
include 'location_DB.php';

function deriveSlug ($string) {
    $junkWords = array("for ","in ","on ","the "," a "," A ","A "," an "," use ","with"," of ");
    $lessjunk = str_replace($junkWords, '', $string);
	$clean = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $lessjunk);
	$flatten = preg_replace('/\s+/', '', $clean);
	return $flatten;
	};


/* system variables */
$GeoServerWS = "nyu_sdr";

/* metadata variables */

$item = get_current_record('item');

$identifier = metadata($item, array('Dublin Core', 'Identifier'), array('all'=>true, 'no_escape'=>true));
$title = metadata($item, array('Dublin Core', 'Title'), array('all'=>true, 'no_escape'=>true));
$description = metadata($item, array('Dublin Core', 'Description'), array('all'=>true, 'no_escape'=>true));
$rights = metadata($item, array('Dublin Core', 'Rights'), array('all'=>true, 'no_escape'=>true));
$provenance = metadata($item, array('Dublin Core', 'Provenance'), array('all'=>true, 'no_escape'=>true));
$references = metadata($item, array('Dublin Core', 'References'), array('all'=>true, 'no_escape'=>true));
$format = metadata($item, array('Dublin Core', 'Format'), array('all'=>true, 'no_escape'=>true));
$language = metadata($item, array('Dublin Core', 'Language'), array('all'=>true, 'no_escape'=>true));
$type = metadata($item, array('Dublin Core', 'Type'), array('all'=>true, 'no_escape'=>true));
$publisher = metadata($item, array('Dublin Core', 'Publisher'), array('all'=>true, 'no_escape'=>true));
$creator = metadata($item, array('Dublin Core', 'Creator'), array('all'=>true, 'no_escape'=>true));
$subject = metadata($item, array('Dublin Core', 'Subject'), array('all'=>true, 'no_escape'=>true));
$dateIssued = metadata($item, array('Dublin Core', 'Date Issued'), array('all'=>true, 'no_escape'=>true));
$temporalCoverage = metadata($item, array('Dublin Core', 'Temporal Coverage'), array('all'=>true, 'no_escape'=>true));
$spatialCoverage = metadata($item, array('Dublin Core', 'Spatial Coverage'), array('all'=>true, 'no_escape'=>true));
$relation = metadata($item, array('Dublin Core', 'Relation'), array('all'=>true, 'no_escape'=>true));
$isPartOf = metadata($item, array('Dublin Core', 'Is Part Of'), array('all'=>true, 'no_escape'=>true));
$UUID = metadata($item, array('GeoBlacklight', 'UUID'), array('all'=>true, 'no_escape'=>true));
$layerID = metadata($item, array('GeoBlacklight', 'Layer ID'), array('all'=>true, 'no_escape'=>true));
$slug = metadata($item, array('GeoBlacklight', 'Slug'), array('all'=>true, 'no_escape'=>true));
$geomType = metadata($item, array('GeoBlacklight', 'Geometry Type'), array('all'=>true, 'no_escape'=>true));
$layerModDate = metadata($item, array('GeoBlacklight', 'Layer Modified Date'), array('all'=>true, 'no_escape'=>true));
$geoRSSBox = metadata($item, array('GeoBlacklight', 'GeoRSS Box'), array('all'=>true, 'no_escape'=>true));
$geoRSSPoint = metadata($item, array('GeoBlacklight', 'GeoRSS Point'), array('all'=>true, 'no_escape'=>true));
$geoRSSPolygon = metadata($item, array('GeoBlacklight', 'GeoRSS Polygon'), array('all'=>true, 'no_escape'=>true));
$solrGeom = metadata($item, array('GeoBlacklight', 'Apache Solr Geometry'), array('all'=>true, 'no_escape'=>true));
$solrYear = metadata($item, array('GeoBlacklight', 'Apache Solr Year'), array('all'=>true, 'no_escape'=>true));

	


if (count($identifier) == 1) {
	$identifier = $identifier[0];
} elseif (count($identifier) == 0) {
	$identifier = "";
	};

if (count($title) == 1) {
	$title = $title[0];
} elseif (count($title) == 0) {
	$title = "MISSING TITLE";
	};

if (count($description) == 1) {
	$description = $description[0];
} elseif (count($description) == 0) {
	$description = "";
	};

if (count($rights) == 1) {
	$rights = $rights[0];
} elseif (count($rights) == 0) {
	$rights = "Restricted";
	};

if (count($provenance) == 1) {
	$provenance = $provenance[0];
} elseif (count($provenance) == 0) {
	$provenance = "NYU";
	};

if (count($references) == 1) {
	$references = $references[0];
} elseif (count($references) == 0) {
	$references = "";
	};

if (count($format) == 1) {
	$format = $format[0];
} elseif (count($format) == 0) {
	$format = "";
	};

if (count($language) == 1) {
	$language = $language[0];
} elseif (count($language) == 0) {
	$language = "";
	};

if (count($type) == 1) {
	$type = $type[0];
} elseif (count($type) == 0) {
	$type = "";
	};

if (count($publisher) == 1) {
	$publisher = $publisher[0];
} elseif (count($publisher) == 0) {
	$publisher = "";
	};

if (count($creator) == 1) {
	$creator = $creator[0];
} elseif (count($creator) == 0) {
	$creator = "";
	};

/*
if (count($subject) == 1) {
	$subject = $subject[0];
} elseif (count($subject) == 0) {
	$subject = "";
	};
*/

if (count($dateIssued) == 1) {
	$dateIssued = $dateIssued[0];
} elseif (count($dateIssued) == 0) {
	$dateIssued = "";
	};

if (count($temporalCoverage) == 1) {
	$temporalCoverage = $temporalCoverage[0];
} elseif (count($temporalCoverage) == 0) {
	$temporalCoverage = "";
	};

/*
if (count($spatialCoverage) == 1) {
	$spatialCoverage = $spatialCoverage[0];
} elseif (count($spatialCoverage) == 0) {
	$spatialCoverage = "";
	};
*/

/*
if (count($relation) == 1) {
	$relation = $relation[0];
} elseif (count($relation) == 0) {
	$relation = "";
	};
*/
if (count($isPartOf) == 1) {
	$isPartOf = $isPartOf[0];
} elseif (count($isPartOf) == 0) {
	$isPartOf = "";
	};

if (count($UUID) == 1) {
	$UUID = $UUID[0];
} elseif (count($UUID) == 0) {
	$UUID = "/UUID/NEEDED";
	};

if (count($layerID) == 1) {
	$layerID = $layerID[0];
} elseif (count($layerID) == 0) {
	$layerID = "";
	};

if (count($slug) == 1) {
	$slug = $slug[0];
} elseif (count($slug) == 0) {
	$slug = "";
	};

if (count($geomType) == 1) {
	$geomType = $geomType[0];
} elseif (count($geomType) == 0) {
	$geomType = "";
	};

if (count($layerModDate) == 1) {
	$layerModDate = $layerModDate[0];
} elseif (count($layerModDate) == 0) {
	$layerModDate = "";
	};

if (count($geoRSSBox) !== 1) {
	$geoRSSBox = "0,0,0,0";
} elseif (count($geoRSSBox) == 1) {
	$geoRSSBox = $geoRSSBox[0];
	};

if (count($geoRSSPoint) == 1) {
	$geoRSSPoint = $geoRSSPoint[0];
} elseif (count($geoRSSPoint) == 0) {
	$geoRSSPoint = "0,0,0,0";
	};

if (count($geoRSSPolygon) == 1) {
	$geoRSSPolygon = $geoRSSPolygon[0];
} elseif (count($geoRSSPolygon) == 0) {
	$geoRSSPolygon = "";
	};

if (count($solrGeom) == 1) {
	$solrGeom = $solrGeom[0];
} elseif (count($solrGeom) == 0) {
	$solrGeom = "";
	};

if (count($solrYear) == 1) {
	$solrYear = $solrYear[0];
} elseif (count($solrYear) == 0) {
	$solrYear = "";
	};

if (is_array($slug)) {
	if ($slug[0] == "OVERRIDE") {
		$slug = $slug[1];
		} else {
		$slug = deriveSlug($title);
		};
} else {
	$slug = deriveSlug($title);
};

if (is_array($layerID)) {
	if ($layerID[0] == "OVERRIDE") {
		$layerID = $layerID[1];
		};
} else {
	$layerID = $GeoServerWS.":".deriveSlug($title);
};

if (is_array($identifier)) {
	if ($identifier[0] == "OVERRIDE") {
	$identifier = $identifier[1];
	};
} else {
	$identifier = $UUID;
};

/* corrections */
$engSynonyms = array("English", "Eng", "english", "engl", "Engl", "ENG");

if (in_array($language, $engSynonyms)) {
	$language = "eng";
	};


/* relations/geonames suggest logic */
$geoIDstack = array();
$subAddStack = array();

$numRel = count($relation);

for ($x = 0; $x < $numRel; $x++) {
    $rel = $relation[$x];
    $RelColonPos = strpos($rel, ":");
    $geonameID = substr($rel, 0, $RelColonPos);
    array_push($geoIDstack, $geonameID);
    $placenamelen = strlen($rel) - $RelColonPos - 2;
    $placenameorig = substr($rel, $RelColonPos+2, $placenamelen);
    $RelPar1 = strpos($rel, "(");
    $RelPar2 = strpos($rel, ")");
    $paren = substr($rel, $RelPar1 - 1, $RelPar2 - $RelPar1 + 2);
    $placenametrim = str_replace($paren, '', $placenameorig);
    	if ($paren == " (country, state, region,...)") {
    		$comma1 = strpos($placenametrim, ",");
    		$comma2 = strpos($placenametrim, ",", $comma1 + 1);
    		$remove = substr($placenametrim, $comma1, $comma2 - $comma1);
    		$placenametrim = str_replace($remove, '', $placenametrim);
    	};
    
    array_push($subAddStack, $placenametrim);

}

$numSubAddStack = count($subAddStack);

for ($x = 0; $x < $numSubAddStack; $x++) {
    array_push($spatialCoverage, $subAddStack[$x]);

}

$relation = array();

for ($x = 0; $x < $numRel; $x++) {
    $link = "http://sws.geonames.org/".$geoIDstack[$x]."/about/rdf";
    array_push($relation, $link);
}

/*GeoNames API query for BBOX lookup */
$geoIDnum = count($geoIDstack);

if ($geoIDnum >= 1) {
    $loclookup = $geoIDstack[0];
    $query = array(
        "geonameId" => $loclookup,
        "username" => "sgbalogh",
    );

    $cc_1 = curl_init();

    curl_setopt($cc_1, CURLOPT_URL, "http://api.geonames.org/getJSON?" . http_build_query($query));
    curl_setopt($cc_1, CURLOPT_HEADER, 0);
    curl_setopt($cc_1, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($cc_1);
    curl_close($cc_1);

    $output_json = json_decode($output, $assoc = true);
    $res_north = $output_json['bbox']['north'];
    $res_south = $output_json['bbox']['south'];
    $res_east = $output_json['bbox']['east'];
    $res_west = $output_json['bbox']['west'];
};

/*end geonames */




/* references logic */
if (strpos($UUID, ".net/") !== false) {
	$UUIDNetPos = strpos($UUID, ".net/");
	$UUIDNumBegin = $UUIDNetPos + 5;
	$UUID_uniq = substr($UUID, $UUIDNumBegin, strlen($UUID));
	$repoFileNum = "2";
	$downloadURL = "https://archive.nyu.edu/bitstream/".$UUID_uniq."/".$repoFileNum."/".$slug.".zip";
	$geoserverPublic = "http://geoserver.nyusdr.com:8080/geoserver/".$GeoServerWS."/";
	$geoserverRestricted = "http://geoserver-restricted.nyusdr.com:8080/geoserver/".$GeoServerWS."/";
} else {
	$UUID_uniq = "NEED/UUID";
	$repoFileNum = "9";
	$downloadURL = "NEED UUID";
	$geoserverPublic = "NEED UUID";
	$geoserverRestricted = "NEED UUID";
	};
	

if ($rights == "Public") {
	$WFS = $geoserverPublic."wfs";
	$WMS = $geoserverPublic."wms";
	} elseif ($rights == "Restricted") {
	$WFS = $geoserverRestricted."wfs";
	$WMS = $geoserverRestricted."wms";
	} else {
	$WFS = "ERROR DETERMINING URL, CHECK RIGHTS SECTION";
	$WMS = "ERROR DETERMINING URL, CHECK RIGHTS SECTION";
	};

/*
$references = array(
"http://schema.org/url" => $UUID,
"http://schema.org/downloadUrl" => $downloadURL,
"http://www.opengis.net/def/serviceType/ogc/wfs" => $WFS,
"http://www.opengis.net/def/serviceType/ogc/wms" => $WMS,
);
*/

$references = "{\"http://schema.org/url\":\"".$UUID."\",\"http://schema.org/downloadUrl\":\"".$downloadURL."\",\"http://www.opengis.net/def/serviceType/ogc/wfs\":\"".$WFS."\",\"http://www.opengis.net/def/serviceType/ogc/wms\":\"".$WMS."\"}";

/* polygon parser logic */

/* sample: -125.5339570045,32.7232795799,-113.9665679932,37.6842844962 as W S E N */

$numlocs = count($locDB);

if ($geoRSSBox !== "0,0,0,0") {
    /*
    for ($x = 0; $x < $numlocs; $x++) {
        $opLoc = $locDB[$x]['location'];
        $opBBOX = $locDB[$x]['bbox'];
        if ($geoRSSBox == $opLoc) {
            $geoRSSBox = $locDB[$x]['bbox'];
        };
    };
    */


    $posCom1 = strpos($geoRSSBox, ",");
    $posCom2 = strpos($geoRSSBox, ",", $posCom1 + 1);
    $posCom3 = strpos($geoRSSBox, ",", $posCom2 + 1);

    $Slen = $posCom2 - $posCom1 - 1;
    $Elen = $posCom3 - $posCom2 - 1;
    $Nlen = strlen($geoRSSBox) - $posCom3 - 1;

    $W = substr($geoRSSBox, 0, $posCom1);
    $S = substr($geoRSSBox, $posCom1 + 1, $Slen);
    $E = substr($geoRSSBox, $posCom2 + 1, $Elen);
    $N = substr($geoRSSBox, $posCom3 + 1, $Nlen);
} else {
    $N = 0;
    $S = 0;
    $E = 0;
    $W = 0;
}

if (isset($res_north)) {
    $N = $res_north;
    $S = $res_south;
    $E = $res_east;
    $W = $res_east;
} else {};

$geoRSSBox = $S." ".$W." ".$N." ".$E;
$geoRSSPolygon = $S." ".$W." ".$N." ".$W." ".$N." ".$E." ".$S." ".$E." ".$S." ".$W;
$solrGeom = "ENVELOPE(".$W.", ".$E.", ".$N.", ".$S.")";

/* date parsing */
$CDT = getdate();
$layerModDate = $CDT['year']."-".$CDT['mon']."-".$CDT['mday']."T".$CDT['hours'].":".$CDT['minutes'].":".$CDT['seconds']."Z";

?>
{
"uuid": <?php echo(json_encode($UUID)); ?>,
"dc_identifier_s": <?php echo(json_encode($identifier)); ?>,
"dc_title_s": <?php echo(json_encode($title)); ?>,
"dc_description_s": <?php echo(json_encode($description)); ?>,
"dc_rights_s": <?php echo(json_encode($rights)); ?>,
"dct_provenance_s": <?php echo(json_encode($provenance)); ?>,
"dct_references_s": <?php echo(json_encode($references, JSON_UNESCAPED_SLASHES)); ?>,
"layer_id_s": <?php echo(json_encode($layerID)); ?>,
"layer_slug_s": <?php echo(json_encode($slug)); ?>,
"layer_geom_type_s": <?php echo(json_encode($geomType)); ?>,
"layer_modified_dt": <?php echo(json_encode($layerModDate)); ?>,
"dc_format_s": <?php echo(json_encode($format)); ?>,
"dc_language_s": <?php echo(json_encode($language)); ?>,
"dc_type_s": <?php echo(json_encode($type)); ?>,
"dc_publisher_s": <?php echo(json_encode($publisher)); ?>,
"dc_creator_sm": <?php echo(json_encode($creator)); ?>,
"dc_subject_sm": <?php echo(json_encode($subject)); ?>,
"dct_isPartOf_sm": <?php echo(json_encode($isPartOf)); ?>,
"dct_issued_s": <?php echo(json_encode($dateIssued)); ?>,
"dct_temporal_sm": <?php echo(json_encode($temporalCoverage)); ?>,
"dct_spatial_sm": <?php echo(json_encode($spatialCoverage)); ?>,
"dc_relation_sm": <?php echo(json_encode($relation)); ?>,
"georss_box_s": <?php echo(json_encode($geoRSSBox)); ?>,
"georss_polygon_s": <?php echo(json_encode($geoRSSPolygon)); ?>,
"solr_geom": <?php echo(json_encode($solrGeom)); ?>,
"solr_year_i": <?php echo(json_encode(intval($solrYear))); ?>
}