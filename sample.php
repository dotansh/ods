<?php
/**
* Simple example of creating and styling a new spreadsheet
*/
require_once "ods.php";

$doc = new ods();
$list = $doc->addSheet("test");
$list->setRtl();
$styleBody = $doc->addStyle();
$styleBody->set(
		array(
			"cell" => array(
				"fo:padding" => "0.028in",
				"fo:border"    => "0.06pt solid #1f1c1b",
				),
			"paragraph" => array(
				"style:writing-mode" => "rl-tb"
				),
			"text" => array(
				"style:font-name" => "Arial",
				"style:font-name-complex" => "Arial",
				"fo:font-size" => "12pt",
				"style:font-size-complex" => "12pt",
				),
		     )
	       );
$styleBodyRed = $styleBody->copy()->set(array("text" => array("fo:color" => "#ff0000")));
$styleHeader = $styleBody->copy()->set(array("cell" => array(
				"fo:border-bottom" => "0.99pt solid #1f1c1b",
				"fo:background-color" => "#c0c0c0"
				),
			"text" => array( "fo:font-weight" => "bold", "style:font-weight-complex" => "bold")
			));
$styleTime = $styleBody->copy()->set(array("top" => array("style:data-style-name" => "Ntime")));
$styleDate = $styleBody->copy()->set(array("top" => array("style:data-style-name" => "Ndate")));

$row = $list->addRow();
$row->addCell("Name", 'string', $styleHeader);
$row->addCell("id", 'string', $styleHeader);
$row->addCell("hour", 'string', $styleHeader);
$row->addCell("date", 'string', $styleHeader);

$row = $list->addRow();
$row->addCell("John", 'string', $styleBody);
$row->addCell("1234", 'float', $styleBody);
$row->addCell("14:42", 'time', $styleTime);
$row->addCell("9/4/2014", 'date', $styleDate);

$row = $list->addRow();
$row->addCell("Doe", 'string', $styleBody);
$row->addCell("4321", 'float', $styleBody);
$row->addCell("15:00", 'time', $styleTime);
$row->addCell("11/4/2014", 'date', $styleDate);

$doc->send();

?> 
