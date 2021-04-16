<?php

$name = tmpSafeData('name');
$phone = tmpSafeData('phone');


if(empty($phone))
{
	echo 'empty required filed';
	exit;
}

$email = tmpSafeData('email');
$formComment = tmpSafeData('formComment');
$formId = tmpSafeData('formId');

if(empty($formId)){
	 $formId = 0;
}

$formComment .="\r\n\r\n" . "HTTP_REFERER: " . $_SERVER['HTTP_REFERER'];


 # formDataArray
		 #----------------------------------------------------
		 $field_sourceGroup  = urlDecode(tmpSafeData_SESSION('sourceGroup'));
		 $field_utmSource    = urlDecode(tmpSafeData_SESSION('utm_source'));
		 $field_utmMedium    = urlDecode(tmpSafeData_SESSION('utm_medium'));
		 $field_utmCampaign  = urlDecode(tmpSafeData_SESSION('utm_campaign'));
		 $field_utmTerm      = urlDecode(tmpSafeData_SESSION('utm_term'));
		 $field_utmContent   = urlDecode(tmpSafeData_SESSION('utm_content'));
		 $field_gaCID        = tmpSafeData('gaClientId');
		 
		 $field_FormComment  = ''.$subject."\r\n"
			.(!empty($field_FormComment)   ?  'FormComment: '.$field_FormComment."\r\n"             :  '')
			.'Referer page: '.$HTTP_REFERER."\r\n";
		 
		 
		 # $field_gaCID
		 #----------------------------------------------------
		 if (empty($field_gaCID))
			{
			 if (isSet($_COOKIE['_ga'])) {
				 try
					{
					 $tmp = explode('.', $_COOKIE['_ga']);
					 if (count($tmp) == 4) {
						 list($version, $domainDepth, $cid1, $cid2) = $tmp;
						 $field_gaCID = $cid1.'.'.$cid2;
						}
					}
				 catch(Exception $e)
					{}
				}
			}
		 
		 
		 
		 # DB_mySQLi
		 #----------------------------------------------------
		 require $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
		require $_SERVER['DOCUMENT_ROOT'].'/wp-includes/class.DB_mySQLi.php';
		 $DB = new DB_mySQLi(array(
			 'db_host' => DB_HOST,
			 'db_name' => DB_NAME,
			 'db_user' => DB_USER,
			 'db_pass' => DB_PASSWORD
			));
		 
		 $DB->myQuery('INSERT INTO SoftProCRM_Forms (
				 FormTypeID, DateCreated,
				 sourceGroup, utmSource, utmMedium, utmCampaign, utmTerm, utmContent, gaCID,
				 PersonName, PersonPhone, PersonEmail,
				 FormComment
				)
			 VALUES (
				 '.$formId.', \''.Date('Y-m-d H:i:s').'\',
				 \''.$field_sourceGroup.'\', \''.$field_utmSource.'\', \''.$field_utmMedium.'\', \''.$field_utmCampaign.'\', \''.$field_utmTerm.'\', \''.$field_utmContent.'\', \''.$field_gaCID.'\',
				 \''.$name.'\', \''.$phone.'\', \''.$email.'\',
				 \''.trim($formComment).'\'
				);
			');
		 
		 echo 'ok';
		 exit;

function tmpSafeData($key)
	{
	 return Trim(Strip_Tags(StripSlashes(str_Replace(array('\'','"'), ' ', (isSet($_POST[$key])  ?  $_POST[$key]  :  ''))), '<br/>'));
	}
function tmpSafeData_SESSION($key)
	{
	 return Trim(Strip_Tags(StripSlashes(str_Replace(array('\'','"'), ' ', (isSet($_SESSION[$key])  ?  $_SESSION[$key]  :  ''))), '<br/>'));
	}





