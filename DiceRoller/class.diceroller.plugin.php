<?php if (!defined('APPLICATION')) exit();

// Plugin Definition
$PluginInfo['DiceRoller'] = array(
   'Name' => 'Dice Roller',
   'Description' => 'Rolls dice in the forum.',
   'Version' => '0.1',
   'RequiredApplications' => array('Vanilla' => '2.0.10'),
   'Author' => "David Jensen",
   'AuthorEmail' => 'david.jensen@build47.com',
   'AuthorUrl' => 'http://www.build47.com'
);

class DiceRollerPlugin extends Gdn_Plugin {

    public function __construct() {
    }

    public function CommentModel_BeforeSaveComment_Handler(&$Sender) {
        error_log($Sender->EventArguments['FormPostValues']);
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = $FormPostValues['Body'] . " Hello world!";
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }

    public function DiscussionModel_BeforeSaveDiscussion_Handler(&$Sender) {
        error_log($Sender->EventArguments['FormPostValues']);
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = $FormPostValues['Body'] . " Hello world!";
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }

    public function Setup(){
        error_log('DiceRollerPlugin Setup');
    }
}

?>
