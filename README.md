# GeoBlacklight Metadata-JSON plugin for Omeka

###Overview
This repo is a plugin for [Omeka](http://omeka.org/) (2.3+) which fascilitates the collection of metadata about geospatial datasets, in accordance with the [GeoBlacklight Schema](https://github.com/geoblacklight/geoblacklight-schema). For background on the GeoBlacklight project, [see here](http://journal.code4lib.org/articles/9710).

This plugin allows users to submit metadata––using Dublin Core, GeoRSS, and GeoBlacklight-specific inputs––and generate JSON-formatted records for use in Solr with the [GeoBlacklight](http://geoblacklight.org/) dataset discovery platform.

The JSON-producing version of this plugin contains many enhancements compared to my previous XML-producing version. Most of these features reduce the total amount of metadata input from the user by performing data transformations and derivations to populate a record.

####Features

1. Plugin will generate LayerID, Slug, and a dataset downloadURL from Title input.
2. Detects synonyms and replaces with standarized language (e.g. "English" => "eng")
3. Generates References field with the GeoServer URL corresponding to the Rights setting, and the DSpace download URL corresponding to the UURI.
4. Parses N S E W coordinates if user submits custom bounding box, and uses these coordinates to generate Solr and GeoRSS bounding box geometry.
5. Introduces suggestion service that populates autocomplete suggestions for Relation based on placenames from the GeoNames API, writes correctly formatted placenames into Place field, and extracts linked-data (RDF) URLs for the cooresponding locations ([jeoQuery](http://tompi.github.io/jeoquery/) is used for this).
6. Extracts bounding box data coorresponding to GeonameID (provided in previous step) from GeoNames lookup API.
7. Allows batch exporting of unlimited amount of JSON records from Omeka API.
8. Includes  log and timing data reporting for batch record exports.

####Installation
In order to install this plugin, you must be using Omeka 2.3+ and have Dublin Core Extended installed.

Download the most current version from the `master` branch, rename the folder to 
`GeoBlacklightMetadata` and upload to your `/plugins` directory.

GeoBlacklight Metadata requires that you provide a path to jeoQuery and Live Query. Before installing (!), make sure to have the two JS scripts hosted in a web-accessible directory, and change the [URLs specified](https://github.com/sgbalogh/omeka_GeoBlacklightMetadata-JSON/blob/master/GeoBlacklightMetadataPlugin.php#L80) in `GeoBlacklightMetadataPlugin.php`.

Note: the API-call to Geonames uses the PHP curl_init() function. If your server doesn't already have that installed (and you use apt-get), just run: `sudo apt-get install php5-curl`.


