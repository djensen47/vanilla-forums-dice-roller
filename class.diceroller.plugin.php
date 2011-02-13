<?php if (!defined('APPLICATION')) exit();

// Plugin Definition
$PluginInfo['DiceRoller'] = array(
   'Description' => 'Rolls dice in the forum.',
   'Version' => '1.0',
   'Author' => "David Jensen",
   'AuthorEmail' => 'david.jensen@build47.com',
   'AuthorUrl' => 'http://www.build47.com'
);

class DiceRoller implements Gdn_IPlugin {
    public function Base_BeforeSaveComment_Handler($Sender) {
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues = $FormPostValue . '<div>More</div>';
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    
   
    }
}

?>
