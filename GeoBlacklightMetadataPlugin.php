<?php
/**
 * GeoBlacklight Element Set for Omeka
 * 
 * Content in this plugin was shamelessly adapted from the Roy Rosenzweig Center for History and New Media's Dublin Core Extended plugin (http://omeka.org/add-ons/plugins/dublin-core-extended/)
 * ...and also (maybe even more so!) from Pop Up Archive and Daniel Berthereau's PBCore Element Set plugin (http://omeka.org/add-ons/plugins/pbcore-element-set/)
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

class GeoBlacklightMetadataPlugin extends Omeka_Plugin_AbstractPlugin
{

	private $_elementSetName = 'GeoBlacklight';
	
      /**
     * @var array Hooks for the plugin.
     */
    protected $_hooks = array(
        'install',
        'uninstall',
        'admin_append_to_plugin_uninstall_message',
    );

    /**
     * @var array Filters for the plugin.
     */
    protected $_filters = array(
        'response_contexts',
        'action_contexts',
        'dc_identifier_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Identifier'),
        'dc_title_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Title'),
        'dc_description_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Description'),
        'dc_rights_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Rights'),
        'dc_provenance_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Provenance'),
        'dc_references_edit' => array('ElementForm', 'Item', 'Dublin Core', 'References'),
        'dc_creator_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Creator'),
        'dc_format_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Format'),
        'dc_language_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Language'),
        'dc_publisher_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Publisher'),
        'dc_relation_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Relation'),
        'dc_subject_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Subject'),
        'dc_type_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Type'),
        'dc_spatial_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Spatial Coverage'),
        'dc_temporal_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Temporal Coverage'),
        'dc_issued_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Date Issued'),
        'dc_isPartOf_edit' => array('ElementForm', 'Item', 'Dublin Core', 'Is Part Of'),
        'geoblacklight_grbox_edit' => array('ElementForm', 'Item', 'GeoBlacklight', 'GeoRSS Box'),
        'geoblacklight_georsspoly_description_edit' => array('ElementForm', 'Item', 'GeoBlacklight', 'GeoRSS Polygon'),
    );


    /**
     * Install the plugin.
     */
    public function hookInstall()
    {
        // Load elements to add.
        require_once('elements.php');

        // Don't install if an element set already exists.
        if ($this->_getElementSet($this->_elementSetName)) {
            throw new Omeka_Plugin_Installer_Exception('An element set by the name "' . $this->_elementSetName . '" already exists. You must delete that element set to install this plugin.');
        }

        insert_element_set($elementSetMetadata, $elements);
    }

    /**
     * Uninstall the plugin.
     */
    public function hookUninstall()
    {
        $this->_deleteElementSet($this->_elementSetName);

        $this->_uninstallOptions();
    }

    /**
     * Warns before the uninstallation of the plugin.
     */
    public function hookAdminAppendToPluginUninstallMessage()
    {
        echo '<p><strong>' . __('Warning') . '</strong>:'
            . __('This will remove all the "' . $this->_elementSetName . '" elements added by this plugin and permanently delete all element texts entered in those fields.')
            . '</p>';
    }


    public function filterResponseContexts($contexts)
    {
        $contexts['GeoBlacklight'] = array(
            'suffix'  => 'GeoBlacklight',
            'headers' => array('Content-Type' => 'text/json'),
        );

        return $contexts;
    }

    public function filterActionContexts($contexts, $controller)
    {
        if ($controller['controller'] instanceof ItemsController) {
            $contexts['show'][] = 'GeoBlacklight';
            $contexts['browse'][] = 'GeoBlacklight';
        }

        return $contexts;
    }

    private function _getElementSet($elementSetName)
    {
        return $this->_db
            ->getTable('ElementSet')
            ->findByName($elementSetName);
    }

    private function _deleteElementSet($elementSetName)
    {
        $elementSet = $this->_getElementSet($elementSetName);

        if ($elementSet) {
            $elements = $elementSet->getElements();
            foreach ($elements as $element) {
                $element->delete();
            }
            $elementSet->delete();
        }
    }
    
    public function dc_identifier_edit($components, $args)
    {
        $components['comment'] = "If you are depositing a data set, leave this field blank.";
        return $components;
    }
    public function dc_title_edit($components, $args)
    {
        $components['comment'] = "The title should describe the data’s theme, geography, and content date in a human readable form. The title should reflect what your dataset is about and what distinguishes it.";
        return $components;
    }
    public function dc_description_edit($components, $args)
    {
        $components['comment'] = "Write a concise, descriptive overview of the dataset that will help others evaluate content and uses of the data. You should include information on geographic coverage, data themes, sources, dates, data type, main features/attributes, demographics, or other information included in the attribute table (if any).";
        return $components;
    }
    public function dc_rights_edit($components, $args)
    {
        $components['comment'] = "Select either \"public\" or \"private.\" If you have used data that comes from a protected or proprietary source, you must select \"private.\"";
        return $components;
    }
    public function dc_provenance_edit($components, $args)
    {
        $components['comment'] = "";
        return $components;
    }
    public function dc_references_edit($components, $args)
    {
        $components['comment'] = "If you are depositing a data set, leave this field blank.";
        return $components;
    }
    public function dc_creator_edit($components, $args)
    {
        $components['comment'] = "This field is optional. Typically, there won't be a specific author or person attached to the creation of a map or data file, but if there is, put it here.";
        return $components;
    }
    public function dc_format_edit($components, $args)
    {
        $components['comment'] = "Select the file format of the data from the menu below.";
        return $components;
    }
    public function dc_language_edit($components, $args)
    {
        $components['comment'] = "Select the language from the menu below. If your language is not on the list, leave this field blank. 98 percent of the time, the language will be \"<tt>eng</tt>\"";
        return $components;
    }
    public function dc_publisher_edit($components, $args)
    {
        $components['comment'] = "Describe the publisher of the map if you know it. If you are unsure, leave this field blank. All entries should be taken from the <a href=\"http://authorities.loc.gov/cgi-bin/Pwebrecon.cgi?DB=local&PAGE=First\" target=\"_blank\">LOC Name Authority</a> so search for specific terms with this form and use the names it generates. If you can't find an exact name, just leave blank.";
        return $components;
    }
    public function dc_relation_edit($components, $args)
    {
        $components['comment'] = "Complete this field by entering the URI associated with the seven-digit GeoNames number. The format is as follows:<br><tt>http://sws.geonames.org/#######/about/rdf</tt><br><br>Separate multiple names into individual fields. If you have not identified any place names for your layer, leave this field blank.";
        return $components;
    }
    public function dc_subject_edit($components, $args)
    {
        $components['comment'] = "Assign subject headings from the Library of Congress authority only (<a href=\"http://authorities.loc.gov/cgi-bin/Pwebrecon.cgi?DB=local&PAGE=First\" target=\"_blank\">more info</a>). All terms must come from the drop down menu. You are encouraged to add at least 5-6 terms, but do so by adding fields with the \"Add Input\" button.";
        return $components;
    }
    public function dc_type_edit($components, $args)
    {
        $components['comment'] = "Pick from the menu below.";
        return $components;
    }
    public function dc_spatial_edit($components, $args)
    {
        $components['comment'] = "Associate as many place names to your layer as make sense for discovery of the data. Focus primarily on the names of administrative units but also include other place names. Strive to have at least 3-4 place names. All names must align with the GeoNames ontology. If you need help finding a specific place name, <a href=\"http://www.geonames.org/v3\" target=\"_blank\">click here</a> and search via the map. If you have any doubts, leave this field blank.";
        return $components;
    }
    public function dc_temporal_edit($components, $args)
    {
        $components['comment'] = "Indicate the date or date range of the data associated with the content. Use only 4-digit years (<tt>2015</tt> or <tt>2012-2015</tt>)";
        return $components;
    }
    public function dc_issued_edit($components, $args)
    {
        $components['comment'] = "Only include this date if it is available. If you are submitting an originally-created data set, put the current date in. Only use <tt>MM/DD/YYYY</tt> as a format in this field. Otherwise, leave it blank.";
        return $components;
    }
    public function dc_isPartOf_edit($components, $args)
    {
        $components['comment'] = "If you are depositing a data set, leave this field blank.";
        return $components;
    }
    public function geoblacklight_grbox_edit($components, $args)
    {
    	$components['description'] = "Bounding box as maximum values for <tt>S W N E</tt><br><br>";
        $components['comment'] = "Provide the coordinates for the area your layer covers. To do this, use <a href=\"http://boundingbox.klokantech.com/\" target=\"_blank\">this bounding box tool</a> and draw a box around the total area your layer represents. Toggle down to CSV, copy the value to your clipboard, and then paste the value here. Finally, remove the commas and leave white spaces in between the numbers.";
        return $components;
    }
     public function geoblacklight_georsspoly_description_edit($components, $args)
    {
        $components['description'] = "Shape of the layer as a Polygon in the form:<br><tt>S W N W N E S E S W</tt><br>";
        return $components;
    }
    
}
