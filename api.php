<?php
/*
replacements for ipb hash's
& to &amp; (do this first so that you don't double convert any others below)
\ to &#092 ; ( no space between 2 and ; )
! to &#33;
$ to &#036;
" to &quot;
< to &lt;
> to &gt;
' to &#39;
***note from gigawiz, # doesn't get passed properly  in url so i pass it in as 'gigahash' then convert it back to a regular #.
*/
/* Variables */
$name		= $_GET['name'];
$md5Pass	= $_GET['password'];
$md5Pass = str_replace("gigahash", "#", $md5Pass);
$md5Pass = str_replace("&", "&amp;", $md5Pass);
$md5Pass = str_replace("\\", "&#092", $md5Pass);
$md5Pass = str_replace("!", "&#33;", $md5Pass);
$md5Pass = str_replace("$", "&#036;", $md5Pass);
$md5Pass = str_replace("\"", "&quot;", $md5Pass);
$md5Pass = str_replace("<", "&lt;", $md5Pass);
$md5Pass = str_replace(">", "&gt;", $md5Pass);
$md5Pass = str_replace("'", "&#39;", $md5Pass);
/* Init IPB */
define( 'IPS_ENFORCE_ACCESS', TRUE );
define( 'IPB_THIS_SCRIPT', 'public' );
require_once( './initdata.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsRegistry.php' );/*noLibHook*/
require_once( IPS_ROOT_PATH . 'sources/base/ipsController.php' );/*noLibHook*/
$registry = ipsRegistry::instance();
$registry->init();

/* Get Member */
// * $member = IPSMember::load( 'MattM', 'all', 'displayname' ); // Can also use 'username', 'email' or 'id'
$member = IPSMember::load( $name, 'none', 'username' );
if ( !$member['member_id'] )
{
	echo "bad password or username";
	exit;
}
$md5Pass=md5($md5Pass);
/* Authenticate */
if ( IPSMember::authenticateMember( $member['member_id'], $md5Pass ) )
{
	echo "success";
}
else
{
	echo "bad password or username";
}
?>