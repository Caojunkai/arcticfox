<?php

// Russian Language Module for joomlaXplorer (translated by Mikhail M. Pigulsky - mikhail@mikhail.pp.ru)
global $_VERSION;

$GLOBALS["charset"] = "windows-1251";
$GLOBALS["text_dir"] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$GLOBALS["date_fmt"] = "Y/m/d H:i";
$GLOBALS["error_msg"] = array(
      // error
      "error"                  => "������(�)",
      "back"                  => "���������",
      
      // root
      "home"                  => "�������� ���������� �� ����������! ��������� ���������.",
      "abovehome"            => "������� ���������� �� ����� ��������� ���� ��������� ��������.",
      "targetabovehome"      => "����������� ���������� �� ����� ��������� ���� ��������� ��������.",

      // exist
      "direxist"            => "���������� �� ����������",
      //"filedoesexist"      => "����� ���� ��� ����������",
      "fileexist"            => "������ ����� �� ����������",
      "itemdoesexist"            => "����� ������ ��� ����������",
      "itemexist"            => "������ ������� ����������",
      "targetexist"            => "����������� ���������� �� ����������",
      "targetdoesexist"      => "������������ ������� �� ����������",
      
      // open
      "opendir"            => "���������� ������� ����������",
      "readdir"            => "���������� ��������� ����������",

      // access
      "accessdir"            => "��� ��������� �������� � ������ ����������",
      "accessfile"            => "��� ��������� ������������ ������ ����",
      "accessitem"            => "��� ��������� ������������ ������ ������",
      "accessfunc"            => "��� ��������� ������������ ������ �������",
      "accesstarget"            => "��� ��������� ������� � �������� ����������",

      // actions
      "permread"            => "������ � ��������� ���� �������",
      "permchange"            => "������ � ����� ���� �������",
      "openfile"            => "������ � �������� �����",
      "savefile"            => "������ � ���������� �����",
      "createfile"            => "������ � �������� �����",
      "createdir"            => "������ � �������� ����������",
      "uploadfile"            => "������ � �������� �����",
      "copyitem"            => "������ � �����������",
      "moveitem"            => "������ � ��������������",
      "delitem"            => "������ � ��������",
      "chpass"            => "������ � ����� ������",
      "deluser"            => "������ � �������� ������������",
      "adduser"            => "������ � �������� ������������",
      "saveuser"            => "������ � ���������� ������������",
      "searchnothing"            => "������ ������ �� ������ ���� ������",
      
      // misc
      "miscnofunc"            => "������� ����������",
      "miscfilesize"            => "���� ��������� ������������ ������",
      "miscfilepart"            => "���� ��� �������� ��������",
      "miscnoname"            => "�� ������ ���� ������ ���",
      "miscselitems"            => "�� �� ������� ������(�)",
      "miscdelitems"            => "�� �������, ��� ������ ������� \"+num+\" ������(�/��)?",
      "miscdeluser"            => "�� �������, ��� ������ ������� ������������ '\"+user+\"'?",
      "miscnopassdiff"      => "����� ������ �� ���������� �� ��������",
      "miscnopassmatch"      => "������ �� ���������",
      "miscfieldmissed"      => "�� ���������� ������ ����",
      "miscnouserpass"      => "��� ������������ ��� ������ �� ���������",
      "miscselfremove"      => "�� �� ������ ������� ������ ����",
      "miscuserexist"            => "����� ������������ ��� ����������",
      "miscnofinduser"      => "���������� ����� ������������",
	"extract_noarchive" => "The File is no extractable Archive.",
	"extract_unknowntype" => "Unknown Archive Type"
);
$GLOBALS["messages"] = array(
      // links
      "permlink"            => "�������� ����� �������",
      "editlink"            => "�������������",
      "downlink"            => "�������",
      "uplink"            => "������",
      "homelink"            => "�����",
      "reloadlink"            => "��������",
      "copylink"            => "����������",
      "movelink"            => "�����������",
      "dellink"            => "�������",
      "comprlink"            => "������������",
      "adminlink"            => "�����������������",
      "logoutlink"            => "�����",
      "uploadlink"            => "��������",
      "searchlink"            => "�����",
	"extractlink"	=> "Extract Archive",
	'chmodlink'		=> 'Change (chmod) Rights (Folder/File(s))', // new mic
	'mossysinfolink'	=> $_VERSION->PRODUCT.' System Information ('.$_VERSION->PRODUCT.', Server, PHP, mySQL)', // new mic
	'logolink'		=> 'Go to the joomlaXplorer Website (new window)', // new mic
      
      // list
      "nameheader"            => "����",
      "sizeheader"            => "������",
      "typeheader"            => "���",
      "modifheader"            => "�������",
      "permheader"            => "�����",
      "actionheader"            => "��������",
      "pathheader"            => "����",
      
      // buttons
      "btncancel"            => "������",
      "btnsave"            => "���������",
      "btnchange"            => "��������",
      "btnreset"            => "��������",
      "btnclose"            => "�������",
      "btncreate"            => "�������",
      "btnsearch"            => "�����",
      "btnupload"            => "��������",
      "btncopy"            => "����������",
      "btnmove"            => "�����������",
      "btnlogin"            => "�����",
      "btnlogout"            => "�����",
      "btnadd"            => "��������",
      "btnedit"            => "�������������",
      "btnremove"            => "�������",
	
	// user messages, new in joomlaXplorer 1.3.0
	'renamelink'	=> 'RENAME',
	'confirm_delete_file' => 'Are you sure you want to delete this file? \\n%s',
	'success_delete_file' => 'Item(s) successfully deleted.',
	'success_rename_file' => 'The directory/file %s was successfully renamed to %s.',
	
      
      // actions
      "actdir"            => "�����",
      "actperms"            => "�������� �����",
      "actedit"            => "������ ����",
      "actsearchresults"      => "���������� ������",
      "actcopyitems"            => "���������� ������(�)",
      "actcopyfrom"            => "���������� �� /%s � /%s ",
      "actmoveitems"            => "����������� ������(�)",
      "actmovefrom"            => "����������� �� /%s � /%s ",
      "actlogin"            => "�����",
      "actloginheader"      => "�����, ����� ������ ������������ QuiXplorer",
      "actadmin"            => "�����������������",
      "actchpwd"            => "������� ������",
      "actusers"            => "������������",
      "actarchive"            => "�������������� ������(�)",
      "actupload"            => "�������� ����(�)",
      
      // misc
      "miscitems"            => "������(�/��)",
      "miscfree"            => "��������",
      "miscusername"            => "������������",
      "miscpassword"            => "������",
      "miscoldpass"            => "������ ������",
      "miscnewpass"            => "����� ������",
      "miscconfpass"            => "����������� ������",
      "miscconfnewpass"      => "����������� ����� ������",
      "miscchpass"            => "�������� ������",
      "mischomedir"            => "�������� ����������",
      "mischomeurl"            => "�������� URL",
      "miscshowhidden"      => "���������� ���������� �������",
      "mischidepattern"      => "������� �����",
      "miscperms"            => "�����",
      "miscuseritems"            => "(���, �������� ����������, ���������� ���������� �������, ����� �������, �������)",
      "miscadduser"            => "�������� ������������",
      "miscedituser"            => "������������� ������������ '%s'",
      "miscactive"            => "�������",
      "misclang"            => "����",
      "miscnoresult"            => "��� �����������",
      "miscsubdirs"            => "������ � ��������������",
      "miscpermnames"            => array("������ ��������","��������������","����� ������","������ � ����� ������",
                              "�������������"),
      "miscyesno"            => array("��","���","�","�"),
      "miscchmod"            => array("��������", "������", "��������"),
	// from here all new by mic
	'miscowner'			=> 'Owner',
	'miscownerdesc'		=> '<strong>Description:</strong><br />User (UID) /<br />Group (GID)<br />Current rights:<br /><strong> %s ( %s ) </strong>/<br /><strong> %s ( %s )</strong>',

	// sysinfo (new by mic)
	'simamsysinfo'		=> $_VERSION->PRODUCT.' System Info',
	'sisysteminfo'		=> 'System Info',
	'sibuilton'			=> 'Operating System',
	'sidbversion'		=> 'Database Version (MySQL)',
	'siphpversion'		=> 'PHP Version',
	'siphpupdate'		=> 'INFORMATION: <span style="color: red;">The PHP version you use is <strong>not</strong> actual!</span><br />To guarantee all functions and features of '.$_VERSION->PRODUCT.' and addons,<br />you should use as minimum <strong>PHP.Version 4.3</strong>!',
	'siwebserver'		=> 'Webserver',
	'siwebsphpif'		=> 'WebServer - PHP Interface',
	'simamboversion'	=> $_VERSION->PRODUCT.' Version',
	'siuseragent'		=> 'Browser Version',
	'sirelevantsettings' => 'Important PHP Settings',
	'sisafemode'		=> 'Safe Mode',
	'sibasedir'			=> 'Open basedir',
	'sidisplayerrors'	=> 'PHP Errors',
	'sishortopentags'	=> 'Short Open Tags',
	'sifileuploads'		=> 'Datei Uploads',
	'simagicquotes'		=> 'Magic Quotes',
	'siregglobals'		=> 'Register Globals',
	'sioutputbuf'		=> 'Output Buffer',
	'sisesssavepath'	=> 'Session Savepath',
	'sisessautostart'	=> 'Session auto start',
	'sixmlenabled'		=> 'XML enabled',
	'sizlibenabled'		=> 'ZLIB enabled',
	'sidisabledfuncs'	=> 'Non enabled functions',
	'sieditor'			=> 'WYSIWYG Editor',
	'siconfigfile'		=> 'Config file',
	'siphpinfo'			=> 'PHP Info',
	'siphpinformation'	=> 'PHP Information',
	'sipermissions'		=> 'Permissions',
	'sidirperms'		=> 'Directory permissions',
	'sidirpermsmess'	=> 'To be shure that all functions and features of '.$_VERSION->PRODUCT.' are working correct, following folders should have permission to write [chmod 0777]',
	'sionoff'			=> array( 'On', 'Off' ),
	
	'extract_warning' => "Do you really want to extract this file? Here?\\nThis will overwrite existing files when not used carefully!",
	'extract_success' => "Extraction was successful",
	'extract_failure' => "Extraction failed",
	
	'overwrite_files' => 'Overwrite existing file(s)?',
	"viewlink"		=> "VIEW",
	"actview"		=> "Showing source of file",
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_chmod.php file
	'recurse_subdirs'	=> 'Recurse into subdirectories?',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to footer.php file
	'check_version'	=> 'Check for latest version',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_rename.php file
	'rename_file'	=>	'Rename a directory or file...',
	'newname'		=>	'New Name',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_edit.php file
	'returndir'	=>	'Return to directory after saving?',
	'line'		=> 	'Line',
	'column'	=>	'Column',
	'wordwrap'	=>	'Wordwrap: (IE only)',
	'copyfile'	=>	'Copy file into this filename',
	
	// Bookmarks
	'quick_jump' => 'Quick Jump To',
	'already_bookmarked' => 'This directory is already bookmarked',
	'bookmark_was_added' => 'This directory was added to the bookmark list.',
	'not_a_bookmark' => 'This directory is not a bookmark.',
	'bookmark_was_removed' => 'This directory was removed from the bookmark list.',
	'bookmarkfile_not_writable' => "Failed to %s the bookmark.\n The Bookmark File '%s' \nis not writable.",
	
	'lbl_add_bookmark' => 'Add this Directory as Bookmark',
	'lbl_remove_bookmark' => 'Remove this Directory from the Bookmark List',
	
	'enter_alias_name' => 'Please enter the alias name for this bookmark',
	
	'normal_compression' => 'normal compression',
	'good_compression' => 'good compression',
	'best_compression' => 'best compression',
	'no_compression' => 'no compression',
	
	'creating_archive' => 'Creating Archive File...',
	'processed_x_files' => 'Processed %s of %s Files',
	
	'ftp_header' => 'Local FTP Authentication',
	'ftp_login_lbl' => 'Please enter the login credentials for the FTP server',
	'ftp_login_name' => 'FTP User Name',
	'ftp_login_pass' => 'FTP Password',
	'ftp_hostname_port' => 'FTP Server Hostname and Port <br />(Port is optional)',
	'ftp_login_check' => 'Checking FTP connection...',
	'ftp_connection_failed' => "The FTP server could not be contacted. \nPlease check that the FTP server is running on your server.",
	'ftp_login_failed' => "The FTP login failed. Please check the username and password and try again.",
		
	'switch_file_mode' => 'Current mode: <strong>%s</strong>. You could switch to %s mode.',
	'symlink_target' => 'Target of the Symbolic Link',
	
	"permchange"		=> "CHMOD Success:",
	"savefile"		=> "The File was saved.",
	"moveitem"		=> "Moving succeeded.",
	"copyitem"		=> "Copying succeeded.",
	'archive_name' 	=> 'Name of the Archive File',
	'archive_saveToDir' 	=> 'Save the Archive in this directory',
	
	'editor_simple'	=> 'Simple Editor Mode',
	'editor_syntaxhighlight'	=> 'Syntax-Highlighted Mode'
);
?>
