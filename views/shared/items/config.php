<?php

/* PROVENANCE/INSTITUTION FIELD */

	/*If set to true, records will all contain the Institution specified below for
	"dct_provenance_s" */
		$HardCodeInstitution_b = false;
		
	/* If you don't want to hard code the institution, but default to it whenever an
	alternative is not provided, set the following to true.*/
		$DefaultInstitution_b = true;
		
	/* The institution. */
		$Institution = "NYU";
	
/* GeoNames API Customizations */
	
	/* Enter the WEB-ACCESSIBLE paths to the two necessary JS files,
	and your GeoNames API username (please don't use mine!) */
		$jeoQueryLoc = "http://submit.nyusdr.net/js/jeoquery.js";
		$LiveQueryLoc = "http://submit.nyusdr.net/js/jquery.livequery.min.js";
		$GeoNamesUserID = "sgbalogh";

/* Slug Deriver Options */
	/* Automatically prepend slug with the slugified publisher name?
	   e.g.: WorldAdministrativeUnits --> ESRI_WorldAdministrativeUnits */
		$SlugPrependPublisher_b = false;
		
/* UUID Parsing Options */

	/* Use UUID parsing for handle, or just supply own? 
	   NOTE: UUID parsing only works for NYU
	   handle.net UUIDs –– this will use the slug (derived or provided by user) to infer the
	   URL of the .zip file for direct download from NYU FDA */
		$UUIDParsing_b = true;

	/* Insert link to direct download zip file (using slug that was provided or derived)?

       NOTE: Only set this to true if you are using UUID parsing for NYU FDA identifiers!
       If you are not interested in this feature, you may as well turn off UUID parsing as well;
       this is the only advantage to having UUID parsing enabled, at least so far. */
		$DirectDownloadLink_b = true;

/* References Options */
	/* Endpoint URLs for GeoServer and GeoServer workspace names */
		$GeoserverEndpointPublic = "http://maps-public.nyusdr.net/geoserver/";
		$GeoserverEndpointRestricted = "http://maps-restricted.nyusdr.net/geoserver/";
	/* GeoServer Workspace Names */
		$GeoserverWorkspacePublic = "nyu_sdr";
		$GeoserverWorkspaceRestricted = "nyu_sdr";
		
		

/* THE FOLLOWING FIVE VARIABLES ONLY APPLY FOR BROWSE.PHP REQUESTS: */
	/* Enable record production analytics for API requests handled by browse.php? */
		$log_b = true;
		
		/* Location of log for record analytics */
			$speedlog = "/var/www/html/logs/log.txt";

	/* E-mail the report in addition to saving to text? */
		$email_b = false;

		/* E-mail origin for analytic reports */
			$from_email = "me@example.com";
		
		/* E-mail destination for analytic reports */
			$to_email = "me@example.com";

?>