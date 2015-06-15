<?php /* REQUIRES PHP 5.2 OR LATER, on account of json_encode() function. */ ?>
<?php
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
$solrBBox = metadata($item, array('GeoBlacklight', 'Apache Solr Bounding Box'), array('all'=>true, 'no_escape'=>true));
$solrYear = metadata($item, array('GeoBlacklight', 'Apache Solr Year'), array('all'=>true, 'no_escape'=>true));

function deriveSlug ($string) {
	$product = preg_replace('/\s+/', '', $string);
	return $product;
	};
	


if (count($identifier) == 1) {
	$identifier = $spatialCoverage[0];
};

if (count($title) == 1) {
	$title = $title[0];
};

if (count($description) == 1) {
	$description = $description[0];
};

if (count($rights) == 1) {
	$rights = $rights[0];
};

if (count($provenance) == 1) {
	$provenance = $provenance[0];
};

if (count($references) == 1) {
	$references = $references[0];
};

if (count($format) == 1) {
	$format = $format[0];
};

if (count($language) == 1) {
	$language = $language[0];
};

if (count($type) == 1) {
	$type = $type[0];
};

if (count($publisher) == 1) {
	$publisher = $publisher[0];
};

if (count($creator) == 1) {
	$creator = $creator[0];
};

if (count($subject) == 1) {
	$subject = $subject[0];
};

if (count($dateIssued) == 1) {
	$dateIssued = $dateIssued[0];
};

if (count($temporalCoverage) == 1) {
	$temporalCoverage = $temporalCoverage[0];
};

if (count($spatialCoverage) == 1) {
	$spatialCoverage = $spatialCoverage[0];
};

if (count($relation) == 1) {
	$relation = $relation[0];
};

if (count($isPartOf) == 1) {
	$isPartOf = $isPartOf[0];
};

if (count($UUID) == 1) {
	$UUID = $UUID[0];
};

if (count($layerID) == 1) {
	$layerID = $layerID[0];
};

if (count($slug) == 1) {
	$slug = $slug[0];
};

if (count($geomType) == 1) {
	$geomType = $geomType[0];
};

if (count($layerModDate) == 1) {
	$layerModDate = $layerModDate[0];
};

if (count($geoRSSBox) == 1) {
	$geoRSSBox = $geoRSSBox[0];
};

if (count($geoRSSPoint) == 1) {
	$geoRSSPoint = $geoRSSPoint[0];
};

if (count($geoRSSPolygon) == 1) {
	$geoRSSPolygon = $geoRSSPolygon[0];
};

if (count($solrGeom) == 1) {
	$solrGeom = $solrGeom[0];
};

if (count($solrBBox) == 1) {
	$solrBBox = $solrBBox[0];
};

if (count($solrYear) == 1) {
	$solrYear = $solrYear[0];
};

?>
{
"uuid": <?php echo(json_encode($UUID)); ?>,
"dc_identifier_s": <?php echo(json_encode($identifier)); ?>,
"dc_title_s": <?php echo(json_encode($title)); ?>,
"dc_description_s": <?php echo(json_encode($description)); ?>,
"dc_rights_s": <?php echo(json_encode($rights)); ?>,
"dct_provenance_s": <?php echo(json_encode($provenance)); ?>,
"dct_references_s": <?php echo(json_encode($references)); ?>,
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
"solr_geom": <?php echo(json_encode($solrBBox)); ?>,
"solr_year_i": <?php echo(json_encode($solrYear)); ?>,
"derivedSlug": <?php echo(json_encode(deriveSlug($title))); ?>

 }