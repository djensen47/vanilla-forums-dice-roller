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


function rolldice($argstr) {
    $args = explode(' ', $argstr);
    $temp = '';
    foreach($args as $arg) {
        if (preg_match('/\d+d\d+/', $arg)) {
            $dicesides = explode('d', $arg);
            $dice = $dicesides[0];
            $sides = $dicesides[1];
        } else if (preg_match('/\d+/', $arg)) {
            $dice = $arg;
            $sides = 6;
        } else {
            $dice = -1;
            $sides = -1;
        }

        if ($dice > -1 && $sides > -1) {
            $dice_results = array();
            for ($i=0; $i < $dice; $i++)
            {
                $dice_results[$i] = rand(1, $sides);
            }
            sort($dice_results);

            $first = true;
            $temp .= '(';
            foreach($dice_results as $dv) {
                if (!$first) {
                    $temp .= ', ';
                } else {
                    $first = false;
                }
                $temp .= '' . $dv . '';
            }
            $temp .= ')&nbsp;&nbsp;';
        } else {
            $temp .= '(?)&nbsp;&nbsp;';
        }
    }

    return '<div style="border: 1px solid #FF3333; background-color: white; padding: 0.5em;"><img src="/forums/Themes/axisandallies/dice-small.gif" border="0" alt="Dice" style="float: left;"/><b>Rolling ' . $argstr . ':</b><br />' . $temp . '</div>';
    }

class DiceRollerPlugin extends Gdn_Plugin {

    public function __construct() {
    }

    public function CommentModel_BeforeSaveComment_Handler(&$Sender) {
        error_log($Sender->EventArguments['FormPostValues']);
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = preg_replace('~:dice ([ 0-9d]+):~eis', "rolldice('\$1')", $FormPostValues['Body']);
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }

    public function DiscussionModel_BeforeSaveDiscussion_Handler(&$Sender) {
        error_log($Sender->EventArguments['FormPostValues']);
    	$FormPostValues = $Sender->EventArguments['FormPostValues'];
        $FormPostValues['Body'] = preg_replace('~:dice ([ 0-9d]+):~eis', "$this->rolldice('\$1')", $FormPostValues['Body']);
        
        $Sender->EventArguments['FormPostValues'] = $FormPostValues;
    }

    public function Setup(){
        error_log('DiceRollerPlugin Setup');
    }


}

?>
