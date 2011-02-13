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

    public function CommentModel_BeforeSaveComment_Handler(&$Sender) {
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = "Hello world!";
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }

    public function DiscussionModel_BeforeSaveDiscussion_Handler(&$Sender) {
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = "Hello world!";
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }
}

?>
