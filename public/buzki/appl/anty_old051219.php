<HTML><HEAD><TITLE>T2</TITLE>
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="pragma" content="no-cache">
<base target="_self">
<link rel="stylesheet" type="text/css" href="css/main.css">

<SCRIPT language='javascript'>

function checkForm () {
  var spr = 1;

  if ( !document.form2.wybor1[0].checked && !document.form2.wybor1[1].checked && !document.form2.wybor1[2].checked)
  {
    alert ('Musisz wybrac rezultat rozmowy!');
    document.form2.wybor1.focus();
    spr=0;
  }
  else if ( document.form2.cust_id.value == '')
  {
    alert ('Musisz wpisac customer id');
    document.form2.cust_id.focus();
    spr=0;
  }
  else if (document.form2.czas_umowy[1].checked && document.form2.wybor1[0].checked){
	  if ( document.form2.name.value == '')
	  {
	    alert ('Musisz wpisac imie i nazwisko klienta !');
	    document.form2.name.focus();
	    spr=0;
	  }
	  else if ( document.form2.street.value == '')
	  {
	    alert ('Musisz wpisac adres klienta !');
	    document.form2.street.focus();
	    spr=0;
	  }
	  else if ( document.form2.zip.value == '')
	  {
	    alert ('Musisz wpisac adres klienta !');
	    document.form2.zip.focus();
	    spr=0;
	  }
	  else if ( document.form2.city.value == '')
	  {
	    alert ('Musisz wpisac adres klienta !');
	    document.form2.city.focus();
	    spr=0;
	  }

	  else if ( document.form2.tel.value == '')
	  {
	    alert ('Musisz wpisac nr telefonu klienta !');
	    document.form2.tel.focus();
	    spr=0;
	  }
	  else if ( document.form2.signdate.value == '')
	  {
	    alert ('Musisz wpisac date podpisania umowy przez klienta !');
	    document.form2.signdate.focus();
	    spr=0;
	  }

  }

  if (spr==1) {
    document.form2.submit();
  }
}



function onKeyPress () {
      var keycode;
      if (window.event) keycode = window.event.keyCode;
      else if (e) keycode = e.which;
      else return true;
      if (keycode == 13) {
      alert('Prosze kliknac w przycisk ZAPISZ DANE!');
      return false
      }
      return true 
}

document.onkeypress=onKeyPress;

</script>

</head>
<BODY bgcolor=#00ff88>


<script language="JavaScript">
<!--
function Show_Stuff(Click_Menu)
// Function that will swap the display/no display for
// all content within span tags
{
if (document.form2.czas_umowy[1].checked)
{
Click_Menu.style.display = "";
}
else
{
Click_Menu.style.display = "none";
}
}
-->
</script>




<?php

function corpol($tekst)
{
$tekst=str_replace('&#261;','�',$tekst);
$tekst=str_replace('&#324;','�',$tekst);
$tekst=str_replace('&#281;','�',$tekst);
$tekst=str_replace('&#263;','�',$tekst);
$tekst=str_replace('&#347;','�',$tekst);
$tekst=str_replace('&#322;','�',$tekst);
$tekst=str_replace('&#378;','�',$tekst);
$tekst=str_replace('&#380;','�',$tekst);
$tekst=str_replace('&#260;','�',$tekst);
$tekst=str_replace('&#323;','�',$tekst);
$tekst=str_replace('&#280;','�',$tekst);
$tekst=str_replace('&#262;','�',$tekst);
$tekst=str_replace('&#346;','�',$tekst);
$tekst=str_replace('&#321;','�',$tekst);
$tekst=str_replace('&#377;','�',$tekst);
$tekst=str_replace('&#379;','�',$tekst);

return $tekst;
}

// ********************** adres bazy danych **************

$dbname = "intranet";
$dbuser = "sa";
$dbpw = "trpool2";
$dbhost = "172.19.72.2";
$pconnect = 0;

class dbstuff {
        var $querynum = 0;


              function is_uploaded_file($filename) {
                  if (!$tmp_file = get_cfg_var('upload_tmp_dir')) {
                      $tmp_file = dirname(tempnam('', ''));
                  }
                  $tmp_file .= '/' . basename($filename);
                  /* User might have trailing slash in php.ini... */
                  return (ereg_replace('/+', '/', $tmp_file) == $filename);
              }


        function connect($dbhost=dbhost, $dbuser, $dbpw, $dbname, $pconnect=0) {
                if($pconnect) {
                        mssql_pconnect($dbhost, $dbuser, $dbpw);
                } else {
                        mssql_connect($dbhost, $dbuser, $dbpw);
                }
                mssql_select_db($dbname);
        }

        function fetch_array($query) {
                $query = mssql_fetch_array($query);
                return $query;
        }

        function query($sql) {
                $query = mssql_query($sql) or die($sql);
                $this->querynum++;
                return $query;
        }

        function result($query, $row) {
                $query = mssql_result($query, $row);
                return $query;
        }

        function num_rows($query) {
                $query = mssql_num_rows($query);
                return $query;
        }

        function insert_id() {
                $id = mssql_insert_id();
                return $id;
        }

        function fetch_row($query) {
                $query = mssql_fetch_row($query);
                return $query;
        }
}




$db = new dbstuff;
$tempcache = "";
$db->connect($dbhost, $dbuser, $dbpw, $dbname, 0);


echo '
<CENTER>
<B>Tele2 WBT</B><HR>
</CENTER>
';
	

if (!$xmbid)
{

echo "
<B>Uwaga!<BR>
Aby korzystac z aplikacji musisz byc zalogowany/a w Intranecie.</B>
";
exit;

}

if ($oper)
	{
	$query1 = $db->query("SELECT * FROM tab_users WHERE IB_ID='$oper'");
	$member = $db->fetch_array($query1);
	$imie= $member['f_name'];
	$nazwisko= $member['s_name'];
	echo "operator $IB_ID : $imie $nazwisko<BR>";
	}



if (@$oper=="")
	{
	echo '

	<table width=100% height=70%>
	<tr><td align=center>
	<H1><font color="red">TELE2</font><br> WBT</H1>
	</td></tr>

	<tr><td align=center>

	<form name=form1 method="get">
	<b><font color=blue>login operatora</font></b><br><br>
	<TABLE>
	<tr><td>Name</td><td>
	<select name="oper" onChange=window.location="?level=1&oper="+this.options[this.selectedIndex].value;>

	<option value="">- - - - -</option>';

	$query1 = $db->query("SELECT * FROM tab_users ORDER BY s_name");
    	
	while($member = $db->fetch_array($query1)) 
		{
      		echo "<option value=".$member['IB_ID'].">".$member['f_name']." ".$member['s_name']."</option>";
    		}

 	echo '
	</select>
	</td></tr>
	</TABLE>
	</form>
	</td></tr></table>
	';
	}


if ((@$action=="save") and ((!$wybor1) or (!$cust_id)))
	{
	$action='';
	$level=1;
	echo '<B>Musisz wybrac rezultat rozmowy i wpisac customer ID !</B><BR>';

	}


if ((($wybor1=='zrezygnowal') and ($umowa_do10dni=='tak') and ($brak_danych<>'tak') and (@$action=="save")) and ((!$name) or (!$tel)))
	{
	$action='';
	$level=1;
	echo '<B>Musisz wypelnic wszystkie pola!</B><BR>';

	}
	

if (@$level==1)
	{
	echo '
	<form name=form2 method="post">
	<TABLE>
	<tr><td>Rezultat rozmowy</td><td>
	<B>
	<INPUT TYPE="radio" NAME="wybor1" VALUE="zrezygnowal"><font color=red>Klient zrezygnowal</font><BR>
	<INPUT TYPE="radio" NAME="wybor1" VALUE="zastanawia_sie">Klient zastanawia sie<BR>
	<INPUT TYPE="radio" NAME="wybor1" VALUE="nie_zrezygnowal">Klient nie zrezygnowal<BR>
              </B>
 	';
	echo "
<TR>
<TD>
</td><td></td>
<TR>
<TD>
</td><td></td>
<TR>
<TD>
</td><td></td>
<tr><td>Customer ID:</td><td><INPUT NAME=cust_id></td></tr>
<tr><td></td><td>
";
?>
	<INPUT TYPE="radio" NAME="czas_umowy" VALUE="ponad10"  onClick="Show_Stuff(display2)" CHECKED>Umowa podpisana ponad 10 dni temu<BR>
	<INPUT TYPE="radio" NAME="czas_umowy" VALUE="do10jest" onClick="Show_Stuff(display2)">Umowa podpisana do 10 dni (dane klienta znajduja sie w systemie)<BR>
	<INPUT TYPE="radio" NAME="czas_umowy" VALUE="do10brak" onClick="Show_Stuff(display2)">Umowa podpisana do 10 dni (brak danych klienta w systemie - podaj nr telefonu poprzedzony T np. t223456789).<BR></td></tr>
<?php
echo "


";
echo '
	<TR><TD colspan=2>
	<span id="display2" STYLE="display: none">
	<TABLE>
	
	<TR><TD colspan=2><font color=red>Jezeli dane klienta znajduja sie w systemie wypelnij wszystkie ponizsze pola (w przeciwnym wypadku zaznacz "Brak danych klienta w systemie").</font></TD></TR>
	<tr><td>Imie i nazwisko:</td><td><INPUT NAME=name size=50></td></tr>
	<tr><td>ulica:</td><td><INPUT NAME=street size=50></td></tr>
	<tr><td>kod-pocztowy:</td><td><INPUT NAME=zip size=6></td></tr>
	<tr><td>miasto:</td><td><INPUT NAME=city size=50></td></tr>
	<tr><td>numer telefonu:</td><td><INPUT NAME=tel size=20></td></tr>
	<tr><td>data podpisania umowy [RRRR-MM-DD]:</td><td><INPUT NAME=signdate size=10></td></tr>
	</TABLE>
	</span>
	</TD></TR>

';
echo "
<TD>
</td><td></td>
<TR>
<TD>
</td><td></td>
<TR>
<TD>
</td><td>
	</select>
	</td></tr>
						
	
	<tr><td></td><td>
		<INPUT type=\"hidden\" name=\"action\" value=\"save\">
		<INPUT type=\"hidden\" name=\"oper\" value=\"$oper\">
		<INPUT type=\"button\" name=\"send2\" value=\"zapisz dane\" onClick='checkForm()'>
		</td></tr>
	</TABLE>
	</form>
	";
	}




if (@$action=="save") 
{
if (!$wybor3) $wybor3=$wybor2;
if (!$wybor4) $wybor4=$wybor3;

$data=strftime("%Y-%m-%d");
$czas=strftime("%H:%M:%S");

if (($czas_umowy=='do10jest') or ($czas_umowy=='do10brak')) $umowa_do10dni='tak';
	else $umowa_do10dni='';

$query1 = $db->query("INSERT INTO callregistry_anty (wybor, numer, oper, oper_id, data, czas, umowa_do10dni, zmiana_nr) VALUES ('$wybor1','$cust_id','$oper','$xmbid','$data','$czas','$umowa_do10dni', '$zmiana_nr')");

if (($wybor1=='zrezygnowal') and ($czas_umowy=='do10jest'))
	{
		$name=corpol($name);
		$city=corpol($city);
		$street=corpol($street);
		$query1 = $db->query("INSERT INTO callregistry_anty_10 (oper_id, data, czas, cust_id, name, street, zip, city, tel, signdate) VALUES ('$xmbid','$data','$czas', '$cust_id', '$name', '$street', '$zip', '$city', '$tel', '$signdate')");
	}

echo "<HR>Dane zostaly zapisane<HR><br>
<a href=\"?oper=$oper&level=1\">OK</a>";
?>
  <script>
  function redirect()
  {
  window.location.replace("?level=1&oper=<?php=@$oper?>");
  }
  setTimeout("redirect();", 1000);
  </script>
<?php
}
?>

</BODY>
</HTML>