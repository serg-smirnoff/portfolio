<?php


/**********************************************************************\
*          ���������! �� ����� ���������� ����������� ������.          *
*                                                                      *
* ������ ������ �������� ����������� Demis Group � ��������� ���       *
* ������� � �������, ������� ���������� ��� ������������ �             *
* ����������� �������� SEO-������ ��� ������� ����������� �������      *
* ���������� ������. ���� ������ �� ����� ���� ��������                *
* ������������������� �����. ����, �� ��� ������, �� ��� �� �����      *
* �������� �������� ������������ ������ �����, �������� ��������       *
* ��������� ��� � ����� �����.                                         *
*                                                                      *
* ������ ��� ���� index.php � ����� �����.                             *
* �������� ����� ������� ����������� ����� htaccess.                   *
* � ������ ������ ���������� ���������������� ������ ����:             *
*   php_value auto_prepend_file "...........d-url-rewriter.php"        *
*                                                                      *
* �� ��������� ��������� ���������������� ����� ��������� �������      *
* ����� ����� ����������� � ��������������� ������������� ������������ *
* Demis Group. ���������� � ���, ���� � ��� �������� ������� ��        *
* ������� �������, � �� ���������� �� �����. ���������!                *
*                                                                      *
* � ����� ���������� ������� � ������������� ��������� �����           *
* ��������������� �������� ������������� �������� Demis Group � �����  *
* ��������� ������������� SEO-������ � ������������� ������� �������   *
* ����� � ��������� �������� � �������� ��� ������������.             *
\**********************************************************************/


$u = $uri = $_SERVER['REQUEST_URI'];
/*********

��������� �� ��������. ����������� ����� ������� ���������� �� ������� $aR301SkipCheck

$u = str_replace('/catalog/', '/katalog/', $u);
if(preg_match('#ukey=(.*)$#siU', $u, $m)){
$u = '/'.$m[1].'/';
}

*********/

// ������ ��������� ��� (��� ���� ���������� � �������� ����� �� �������� ����������)

$aURLRewriter = array(

	// '/link1'=>'/link1',


);

// �������� ���������

$aR301SkipCheck = array(

	// '/link1'=>'/link1',
	'/index.php'=>'/',
'/%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8/%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%B8%D0%BA%D0%B0.html'=>'/uslugi/elektrik-na-dom.html',
'/elektrik-na-dom.html'=>'/uslugi/elektrik-na-dom.html',
'/%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8/%D1%81%D0%B0%D0%BD%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0.html'=>'/uslugi/vyzov-santehnika.html',
'/vyzov-santehnika.html'=>'/uslugi/vyzov-santehnika.html',
'/sitemap/'=>'/sitemap',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D0%BA%D0%B0%D0%BA-%D0%BF%D0%BE%D0%B2%D0%B5%D1%81%D0%B8%D1%82%D1%8C-%D0%BB%D1%8E%D1%81%D1%82%D1%80%D1%83.html'=>'/soveti-po-remonty/kak-povesit-lustry.html',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D0%BA%D0%B0%D0%BA-%D0%BF%D0%BE%D0%B2%D0%B5%D1%81%D0%B8%D1%82%D1%8C-%D0%BB%D1%8E%D1%81%D1%82%D1%80%D1%83.html'=>'/soveti-po-remonty/pravila-ustanovki-karniza.html',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D0%B2%D0%B5%D1%88%D0%B0%D0%B5%D0%BC-%D0%BA%D0%B0%D1%80%D0%BD%D0%B8%D0%B7.html'=>'/soveti-po-remonty/ustanovka-unitaza.html',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82-%D0%B2-%D0%BA%D0%B2%D0%B0%D1%80%D1%82%D0%B8%D1%80%D0%B5.html'=>'/soveti-po-remonty/remont-v-kvartire.html',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D0%B2%D1%8B%D1%80%D0%B0%D0%B2%D0%BD%D0%B8%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5-%D0%BF%D0%BE%D0%BB%D0%B0.html'=>'/soveti-po-remonty/vyravnivanie-pola.html',
'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D0%BF%D0%BB%D0%B0%D1%81%D1%82%D0%B8%D0%BA%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BE%D0%BA%D0%BD%D0%B0.html'=>'/soveti-po-remonty/ustanovka-plastikovyh-okon.htm',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D0%B2%D1%81%D0%B5-%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8.html'=>'/rascenki/polnii-price.htm',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D1%81%D0%B0%D0%BD%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0.html'=>'/rascenki/santehnika.html',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%B8%D0%BA%D0%B0.html'=>'/rascenki/elektrika.html',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D0%BE%D1%82%D0%B4%D0%B5%D0%BB%D0%BE%D1%87%D0%BD%D1%8B%D0%B5-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%8B.html'=>'/rascenki/otdelochnye-raboty.html',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D0%BC%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D1%8B%D0%B5-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%8B.html'=>'/rascenki/montazhnye-raboty.html',
'/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/%D0%BE-%D0%BD%D0%B0%D1%81.html'=>'/o-kompanii.html',
'/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/%D0%B2%D0%B0%D0%BA%D0%B0%D0%BD%D1%81%D0%B8%D0%B8.html'=>'/o-kompanii/vakansii.html',
'/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B.html'=>'/kontakty.html',
'/%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8/%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82-%D0%BF%D0%BE%D0%B4-%D0%BA%D0%BB%D1%8E%D1%87.html'=>'/uslugi/remont-pod-klyuch.html',
'/%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8/%D0%BA%D1%83%D1%85%D0%BD%D1%8F-%D0%BF%D0%BE%D0%B4-%D0%BA%D0%BB%D1%8E%D1%87.html'=>'/uslugi/kuhnya-pod-klyuch.html',
'/%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8/%D1%81%D0%B1%D0%BE%D1%80%D0%BA%D0%B0-%D0%BC%D0%B5%D0%B1%D0%B5%D0%BB%D0%B8.html'=>'/uslugi/sborka-mebeli.html',
'/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/%D0%BD%D0%B0%D1%88%D0%B8-%D0%BF%D1%80%D0%BE%D1%84%D0%B5%D1%81%D1%81%D0%B8%D0%BE%D0%BD%D0%B0%D0%BB%D1%8B.html'=>'/o-kompanii/nashi-professionaly.html',

'/?view=featured'=>'/',
'/sitemap.html/'=>'/sitemap',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/25-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.html'=>'/sitemap',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/26-%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8.html'=>'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D0%B2%D1%81%D0%B5-%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8.html',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/28-%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83.html'=>'/%D1%81%D0%BE%D0%B2%D0%B5%D1%82%D1%8B-%D0%BF%D0%BE-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D1%83/%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82-%D0%B2-%D0%BA%D0%B2%D0%B0%D1%80%D1%82%D0%B8%D1%80%D0%B5.html',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/24-%D0%BE-%D0%BD%D0%B0%D1%81.html'=>'/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B.html',
'/uslugi/elektrik-na-dom.html/'=>'/uslugi/elektrik-na-dom.html',
);

// ��������� ��������

$a410Response = array(
	'/test3',

	'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8.html?javascript:void(0);=',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8.html?javascript:void(0)%3b=',
'/component/content/?view=featured',
'/%D1%80%D0%B0%D1%81%D1%86%D0%B5%D0%BD%D0%BA%D0%B8/%D0%BC%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D1%8B%D0%B5-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%8B.html%3E%D0%B7%D0%B4%D0%B5%D1%81%D1%8C%3C/a%3E.%3C/p%3E',

);
$a404Response = array(
	'/test4',
);

// ������ ������ ������

$aURLRewriterOnly = array();
define('DUR_DEBUG', 0); //��������� ������ ������� (����� ���� � ����� ��������� ������ �� ��������)
define('DUR_PREPEND_APPEND', 0); //������ ����� ����� (.htaccess) �� �������������
define('DUR_BASE_ROOT', 0); //��������� ������������� <base href="http://domain.com/"> ������ ������� ��� ������� ���� href="?page=2". ��� �������� ������, �������� ��
define('DUR_LINK_PARAM', 0); //�������� ���� ����� �������� ���� href="?page=2"
define('DUR_ANC_HREF', 0); //��������� ������ ���� href="#ancor"
define('DUR_ROOT_HREF', 1); //��������� ������ ���� href="./"
define('DUR_REGISTER_GLOBALS', 0); //�������������� ���������� ����������
define('DUR_SKIP_POST', 1); //�� ��������� ������� ��� ������� POST
define('DUR_CMS_TYPE', 'NONE'); //��������� ������������ ��� CMS, ��������� ��������: NONE, NETCAT, JOOMLA, HTML, DRUPAL, WEBASYST, ICMS, UMI
define('DUR_OUTPUT_COMPRESS', 'AUTO'); //������ ��������� ������, ��������� ��������: NONE, GZIP, DEFLATE, AUTO, SKIP
define('DUR_SUBDOMAINS', 0); //������������ ���������, ��������� ����� �������� �����!
define('DUR_SKIP_USERAGENT', '#^(|mirror)$#'); //�� ��������� ��������� ��� ��������� HTTP_USER_AGENT (���������)
define('DUR_SKIP_URLS', '#^/_?(admin|manag|bitrix|indy|cms|phpshop|varvara.php|captcha|jscripts/|modules|includes|templates|wp-admin|published)#siU'); //Skip URLS
define('DUR_FIX_CONTLEN', 0); //������� Content-Length
define('DUR_PATHINFO', 0); //�������������� ���������� ��� �������� ���� /index.php/uri

// /new

define('DUR_FIX_RELATIVE', 1); //������� ������������� ������ (������ ��� DUR_MAIN_CYCLE = ortodox)
define('DUR_FIX_DOTTED', 0); //������� ������ �� "./" (������ ��� DUR_MAIN_CYCLE = ortodox)
define('DUR_FIX_HTTP_HOST', $_SERVER['HTTP_HOST']); //������� HTTP_HOST� �������, �����������, ��������, �������� "www.mysite.ru", ����� ��������� ���������� host-��������� ������ ������
define('DUR_CACHE_REWRITED', 0); //���������� ��� ������ � ���� ���������, ������ ���� ������� ����� d-cache � ����� � ������� �� ������
define('DUR_CACHE_MEMORY', 40960000); //����������� ����� ���� (� ������), ��� ���������� ����� �������� ��� ���������
define('DUR_CACHE_TIME', 3); //����������� ����� ����� ����, ��� ���������� ����� �������� ��� ���������
define('DUR_MAIN_CYCLE', 'callback'); //��������� ��� ������ ���� ��������� �����, ��������: callback, str_replace, ortodox

// ������ ���������

define('DUR_TIME_START', microtime(true));
define('DUR_REQUEST_URI', $_SERVER['REQUEST_URI']);
define('DUR_HTTP_HOST', $_SERVER['HTTP_HOST']);
define('DUR_FULL_URI', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define('BX_COMPRESSION_DISABLED', true); //Hack for bitrix
define('DUR_SKIP_THIS', preg_match(DUR_SKIP_URLS, DUR_REQUEST_URI, $aM));
define('DUR_SKIP_R301', !isset($_SERVER['HTTP_USER_AGENT']) || preg_match(DUR_SKIP_USERAGENT, $_SERVER['HTTP_USER_AGENT']));

if (defined('DUR_DEBUG') && DUR_DEBUG) {
	ini_set('display_errors', 1);
	ini_set('error_reportings', E_ALL);
}

if (isset($_GET['_openstat'])) {
	unset($_GET['_openstat']);
	unset($_REQUEST['_openstat']);
	unset($HTTP_GET_VARS['_openstat']);
	$_SERVER['REQUEST_URI'] = preg_replace('%[&?]_openstat=[^&]+(&|$)%siU', '$1', $_SERVER['REQUEST_URI']);
}

if (isset($_GET['yclid'])) {
	unset($_GET['yclid']);
	unset($_REQUEST['yclid']);
	unset($HTTP_GET_VARS['yclid']);
	$_SERVER['REQUEST_URI'] = preg_replace('%[&?]yclid=[^&]+(&|$)%siU', '$1', $_SERVER['REQUEST_URI']);
}

if (in_array($_SERVER['REQUEST_URI'], $a410Response) && !DUR_SKIP_THIS) {
	header('HTTP/1.0 410 Gone');
	echo '<h1 style="font-size: 18pt;">������ 410</h1><p>�������� �������</p><p style="text-align: right; margin: 10px;"><a href="/">�� �������</a></p>';
	exit;
}

if (in_array($_SERVER['REQUEST_URI'], $a404Response) && !DUR_SKIP_THIS) {
	dur404native();
}

if (isset($aR301SkipCheck[$_SERVER['REQUEST_URI']]) && !DUR_SKIP_THIS && !DUR_SKIP_R301) {
	if (!defined('DUR_SKIP_POST') || !DUR_SKIP_POST || (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST')) {
		header('Location: ' . $aR301SkipCheck[$_SERVER['REQUEST_URI']], true, 301);
		exit;
	}
}

if ($u != $uri && !DUR_SKIP_THIS && !DUR_SKIP_R301) {
	if (!defined('DUR_SKIP_POST') || !DUR_SKIP_POST || (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST')) {
		header('Location: ' . $u, true, 301);
		exit;
	}
}

foreach($aURLRewriter as $sKey => $sVal) {
	$aURLRewriter[$sKey] = str_replace(array(
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		'�',
		' '
	) , array(
		'p',
		'y',
		'k',
		'e',
		'h',
		'x',
		'b',
		'a',
		'o',
		'4',
		'c',
		'm',
		'n',
		't',
		'_'
	) , $sVal);
	if (!defined('DUR_SEO_REQUEST_URI') && ($sVal == $_SERVER['REQUEST_URI'])) {
		define('DUR_SEO_REQUEST_URI', $sKey);
	}
}

$aURFlip = array_flip($aURLRewriter);

// ������������ ����������� ����� (�� 10)

for ($i = 0; $i < 10; $i++) {
	foreach($aURLRewriter as $sFrom => $sTo) {
		if (isset($aURLRewriter[$sTo])) {
			$aURLRewriter[$sFrom] = $aURLRewriter[$sTo];
			$aURFlip[$aURLRewriter[$sTo]] = $sFrom;
		}
	}
}

// Joomla hack! (������ ������ �� register globals)

if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'JOOMLA')) {
	$_SERVER['dur'] = array(
		$aURLRewriter,
		$aURFlip,
		$aURLRewriterOnly
	);
}

// ������ ����� �����

if (defined('DUR_PREPEND_APPEND') && DUR_PREPEND_APPEND && !DUR_SKIP_THIS) {
	durRun();
}

// �������

function durRun()
{
	if (defined('DUR_RUNNED')) return;

	//    if (isset())

	define('DUR_RUNNED', 1);
	durR301();
	ob_start('durLinkChanger');
	durIFRewrite();
}

function dur404()
{
	$aPages404 = array(
		'404.php',
		'404.html',
		'404.htm',
		'index.php',
		'index.html',
		'index.htm'
	);
	header('HTTP/1.1 404 Not found');
	foreach($aPages404 as $sPage404) {
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $sPage404)) {
			include ($_SERVER['DOCUMENT_ROOT'] . '/' . $sPage404);

			exit;
		}
	}

	echo '<h1>������ 404</h1><p>�������� �� �������</p><p style="text-align: right; margin: 10px;"><a href="/">�� �������</a></p>';
	exit;
}

function dur404native()
{
	$_SERVER['REQUEST_URI'] = '/thispagewasdeleted';
	$_GET = $_REQUEST = array();
}

function durRewrite($sURL)
{
	global $QUERY_STRING, $REQUEST_URI, $REDIRECT_URL, $HTTP_GET_VARS;
	define('DUR_DEBUG_BEFORE', "SERVER:\n" . durDebugVar($_SERVER) . "\n\nGET:\n" . durDebugVar($_GET) . "\n\nREQUEST:\n" . durDebugVar($_REQUEST) . "\n");
	if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'WEBASYST')) {
		$sURL = '/?__furl_path=' . substr($sURL, 1) . '&frontend=1';
	}

	if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'ICMS')) {
		$sURL = '/index.php?path=' . substr($sURL, 1, -5) . '&frontend=1';
	}

	$QUERY_STRING = strpos($sURL, '?') ? substr($sURL, strpos($sURL, '?') + 1) : '';
	$REQUEST_URI = $sURL;
	$REDIRECT_URL = $sURL;
	$_SERVER['QUERY_STRING'] = $QUERY_STRING;
	$_SERVER['REDIRECT_URL'] = $sURL;
	$_SERVER['REQUEST_URI'] = $sURL;
	if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'NETCAT')) {
		putenv('REQUEST_URI=' . $sURL);
		$_ENV['REQUEST_URI'] = $sURL;
	}

	if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'DRUPAL')) {
		$_GET['q'] = substr($sURL, 1);
		$_REQUEST['q'] = substr($sURL, 1);
	}

	if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'UMI')) {
		$_GET['path'] = substr($sURL, 1);
		$_REQUEST['path'] = substr($sURL, 1);
	}

	if (preg_match_all('%[\?&]([^\=]+)\=([^&]*)%', $sURL, $aM)) {
		$aParams = array();
		foreach($aM[1] as $iKey => $sName) {
			$sVal = urldecode($aM[2][$iKey]);
			if (preg_match('#^(.+)\[\]$#siU', $sName, $aMatch)) {
				$aParams[$aMatch[1]][] = $sVal;
			}
			elseif (preg_match('#^(.+)\[([\w-]+)\]$#siU', $sName, $aMatch)) {
				$aParams[$aMatch[1]][$aMatch[2]] = $sVal;
			}
			else {
				$aParams[$sName] = $sVal;
			}
		}

		foreach($aParams as $sKey => $mVal) {
			$_GET[$sKey] = $mVal;
			$HTTP_GET_VARS[$sKey] = $mVal;
			$_REQUEST[$sKey] = $mVal;
			if (defined('DUR_REGISTER_GLOBALS') && DUR_REGISTER_GLOBALS) {
				global $$sKey;
				$$sKey = $mVal;
			}
		}
	}

	if (defined('DUR_PATHINFO') && DUR_PATHINFO) {
		$_SERVER['PATH_INFO'] = substr($sURL, 1);
		$_SERVER['PHP_SELF'] = $sURL;
	}

	if (DUR_CMS_TYPE == 'HTML') {
		$sFName = $sURL;
		if ($iPos = strpos($sFName, '?')) {
			$sFName = substr($sFName, 0, $iPos);
		}

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $sFName)) {
			include ($_SERVER['DOCUMENT_ROOT'] . $sFName);

			exit;
		}
		else {
			dur404();
		}
	}
}

function durIFRewrite()
{
	global $aURFlip, $aURLRewriter;
	if (DUR_SKIP_THIS) return;
	$sKey = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (defined('DUR_SUBDOMAINS') && DUR_SUBDOMAINS && isset($aURFlip[$sKey])) {
		if (!defined('DUR_ORIG_RURI')) {
			define('DUR_ORIG_RURI', $aURFlip[$sKey]);
		}

		durRewrite($aURFlip[$sKey]);
	}
	elseif (isset($aURFlip[$_SERVER['REQUEST_URI']])) {
		if (!defined('DUR_ORIG_RURI')) {
			define('DUR_ORIG_RURI', $aURFlip[$_SERVER['REQUEST_URI']]);
		}

		durRewrite($aURFlip[$_SERVER['REQUEST_URI']]);
	}
	elseif (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'HTML')) {
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
			durRewrite($_SERVER['REQUEST_URI']);
		}
		else {
			dur404();
		}
	}
}

function durR301()
{
	global $aURFlip, $aURLRewriter;
	if (DUR_SKIP_THIS || DUR_SKIP_R301) return;
	if (defined('DUR_SKIP_POST') && DUR_SKIP_POST && (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')) {
		return;
	}

	if (isset($aURLRewriter[$_SERVER['REQUEST_URI']])) {
		if ('http://' . DUR_HTTP_HOST == trim($aURLRewriter[$_SERVER['REQUEST_URI']], '/')) {
			return;
		}

		header('Location: ' . $aURLRewriter[$_SERVER['REQUEST_URI']], true, 301);
		exit;
	}
}

function durRExpEscape($sStr)
{
	return str_replace(array(
		'?',
		'.',
		'-',
		':',
		'%',
		'[',
		']',
		'(',
		')'
	) , array(
		'\\?',
		'\\.',
		'\\-',
		'\\:',
		'\\%',
		'\\[',
		'\\]',
		'\\(',
		'\\)'
	) , $sStr);
}

function durReplaceOnceLink($sLink, $sNewLink, $sContent)
{
	$sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*' . durRExpEscape($sLink) . '([#\'"\s>])%siU', '$1' . $sNewLink . '$2', $sContent);
	if (strpos($sLink, '&')) $sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*' . durRExpEscape(str_replace('&', '&amp;', $sLink)) . '([#\'"\s>])%siU', '$1' . $sNewLink . '$2', $sContent);
	return $sContent;
}

function durReplaceLink($sHost, $sBase, $sFrom, $sTo, $sContent)
{
	$sNewLink = $sTo;

	//  Link type: "http://domain/link"

	$sContent = durReplaceOnceLink('http://' . $sHost . $sFrom, $sNewLink, $sContent);

	//  Link type: "https://domain.com/link"
	//     $sContent = durReplaceOnceLink ('https://' . $sHost . $sFrom, $sNewLink, $sContent);
	//  Link type: "//domain.com/link"
	//     $sContent = durReplaceOnceLink ('//' . $sHost . $sFrom, $sNewLink, $sContent);

	if (!defined('DUR_FIRST_TIC')) {

		//    Link type: "/link"

		$sContent = durReplaceOnceLink($sFrom, $sNewLink, $sContent);

		//    Link type: "./link"

		if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
			$sContent = durReplaceOnceLink('.' . $sFrom, $sNewLink, $sContent);
		}

		if (defined('DUR_FIX_RELATIVE') && DUR_FIX_RELATIVE) {

			// Link type: "link" (Calc fromlink)

			$aLink = explode('/', $sFrom);
			$aBase = empty($sBase) ? array(
				''
			) : explode('/', str_replace('//', '/', '/' . $sBase));
			$sReplLnk = '';
			for ($i = 0; $i < max(count($aLink) , count($aBase)); $i++) {
				if (isset($aBase[$i]) && isset($aLink[$i])) {
					if ($aLink[$i] == $aBase[$i]) {
						continue;
					}
					else {
						for ($j = $i; $j < count($aBase); $j++) {
							$sReplLnk.= '../';
						}

						for ($j = $i; $j < count($aLink); $j++) {
							$sReplLnk.= $aLink[$j] . '/';
						}

						break;
					}
				}
				elseif (isset($aLink[$i])) {
					$sReplLnk.= $aLink[$i] . '/';
				}
				elseif (isset($aBase[$i])) {
					$sReplLnk.= '../';
				}
			}

			$sReplLnk = preg_replace('%/+%', '/', $sReplLnk);
			$sReplLnk2 = trim($sReplLnk, '/');
			$sReplLnk3 = rtrim($sReplLnk2, '.');
			if (strlen($sReplLnk) > 1) {
				$sContent = durReplaceOnceLink($sReplLnk, $sNewLink, $sContent);
				if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
					$sContent = durReplaceOnceLink('./' . $sReplLnk, $sNewLink, $sContent);
				}
			}

			if (($sReplLnk2 != $sReplLnk) && (strlen($sReplLnk2) > 1)) {
				$sContent = durReplaceOnceLink($sReplLnk2, $sNewLink, $sContent);
				if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
					$sContent = durReplaceOnceLink('./' . $sReplLnk2, $sNewLink, $sContent);
				}
			}

			if (($sReplLnk3 != $sReplLnk2) && (strlen($sReplLnk3) > 1)) {
				$sContent = durReplaceOnceLink($sReplLnk3, $sNewLink, $sContent);
				if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
					$sContent = durReplaceOnceLink('./' . $sReplLnk3, $sNewLink, $sContent);
				}
			}
		}
	}

	return $sContent;
}

function durGZDecode($sS)
{
	$sM = ord(substr($sS, 2, 1));
	$iF = ord(substr($sS, 3, 1));
	if ($iF & 31 != $iF) return null;
	$iLH = 10;
	$iLE = 0;
	if ($iF & 4) {
		if ($iL - $iLH - 2 < 8) return false;
		$iLE = unpack('v', substr($sS, 8, 2));
		$iLE = $iLE[1];
		if ($iL - $iLH - 2 - $iLE < 8) return false;
		$iLH+= 2 + $iLE;
	}

	$iFCN = $iFNL = 0;
	if ($iF & 8) {
		if ($iL - $iLH - 1 < 8) return false;
		$iFNL = strpos(substr($sS, 8 + $iLE) , chr(0));
		if ($iFNL === false || $iL - $iLH - $iFNL - 1 < 8) return false;
		$iLH+= $iFNL + 1;
	}

	if ($iF & 16) {
		if ($iL - $iLH - 1 < 8) return false;
		$iFCN = strpos(substr($sS, 8 + $iLE + $iFNL) , chr(0));
		if ($iFCN === false || $iL - $iLH - $iFCN - 1 < 8) return false;
		$iLH+= $iFCN + 1;
	}

	$sHCRC = '';
	if ($iF & 2) {
		if ($iL - $iLH - 2 < 8) return false;
		$calccrc = crc32(substr($sS, 0, $iLH)) & 0xffff;
		$sHCRC = unpack('v', substr($sS, $iLH, 2));
		$sHCRC = $sHCRC[1];
		if ($sHCRC != $calccrc) return false;
		$iLH+= 2;
	}

	$sScrc = unpack('V', substr($sS, -8, 4));
	$sScrc = $sScrc[1];
	$iSZ = unpack('V', substr($sS, -4));
	$iSZ = $iSZ[1];
	$iLBD = $iL - $iLH - 8;
	if ($iLBD < 1) return null;
	$sB = substr($sS, $iLH, $iLBD);
	$sS = '';
	if ($iLBD > 0) {
		if ($sM == 8) $sS = gzinflate($sB);
		else return false;
	}

	if ($iSZ != strlen($sS) || crc32($sS) != $sScrc) return false;
	return $sS;
}

function durGZDecode2($sS)
{
	$iLen = strlen($sS);
	$sDigits = substr($sS, 0, 2);
	$iMethod = ord(substr($sS, 2, 1));
	$iFlags = ord(substr($sS, 3, 1));
	if ($iFlags & 31 != $iFlags) return false;
	$aMtime = unpack('V', substr($sS, 4, 4));
	$iMtime = $aMtime[1];
	$sXFL = substr($sS, 8, 1);
	$sOS = substr($sS, 8, 1);
	$iHeaderLen = 10;
	$iExtraLen = 0;
	$sExtra = '';
	if ($iFlags & 4) {
		if ($iLen - $iHeaderLen - 2 < 8) return false;
		$iExtraLen = unpack('v', substr($sS, 8, 2));
		$iExtraLen = $iExtraLen[1];
		if ($iLen - $iHeaderLen - 2 - $iExtraLen < 8) return false;
		$sExtra = substr($sS, 10, $iExtraLen);
		$iHeaderLen+= 2 + $iExtraLen;
	}

	$iFilenameLen = 0;
	$sFilename = '';
	if ($iFlags & 8) {
		if ($iLen - $iHeaderLen - 1 < 8) return false;
		$iFilenameLen = strpos(substr($sS, $iHeaderLen) , chr(0));
		if ($iFilenameLen === false || $iLen - $iHeaderLen - $iFilenameLen - 1 < 8) return false;
		$sFilename = substr($sS, $iHeaderLen, $iFilenameLen);
		$iHeaderLen+= $iFilenameLen + 1;
	}

	$iCommentLen = 0;
	$sComment = '';
	if ($iFlags & 16) {
		if ($iLen - $iHeaderLen - 1 < 8) return false;
		$iCommentLen = strpos(substr($sS, $iHeaderLen) , chr(0));
		if ($iCommentLen === false || $iLen - $iHeaderLen - $iCommentLen - 1 < 8) return false;
		$sComment = substr($sS, $iHeaderLen, $iCommentLen);
		$iHeaderLen+= $iCommentLen + 1;
	}

	$sCRC = '';
	if ($iFlags & 2) {
		if ($iLen - $iHeaderLen - 2 < 8) return false;
		$sCalcCRC = crc32(substr($sS, 0, $iHeaderLen)) & 0xffff;
		$sCRC = unpack('v', substr($sS, $iHeaderLen, 2));
		$sCRC = $sCRC[1];
		if ($sCRC != $sCalcCRC) return false;
		$iHeaderLen+= 2;
	}

	$sDataCRC = unpack('V', substr($sS, -8, 4));
	$sDataCRC = sprintf('%u', $sDataCRC[1] & 0xFFFFFFFF);
	$iSize = unpack('V', substr($sS, -4));
	$iSize = $iSize[1];
	$iBodyLen = $iLen - $iHeaderLen - 8;
	if ($iBodyLen < 1) return false;
	$sBody = substr($sS, $iHeaderLen, $iBodyLen);
	$sS = '';
	if ($iBodyLen > 0) {
		switch ($iMethod) {
		case 8:
			$sS = gzinflate($sBody);
			break;

		default:
			return false;
		}
	}

	$sCRC = sprintf('%u', crc32($sS));
	$bCRCOK = ($sCRC == $sDataCRC);
	$bLenOK = ($iSize == strlen($sS));
	if (!$bLenOK || !$bCRCOK) return false;
	return $sS;
}

function durGZCheck($sContent)
{
	$iLen = strlen($sContent);
	if ($iLen < 18 || strcmp(substr($sContent, 0, 2) , "\x1f\x8b")) {
		return $sContent;
	}

	$sData = durGZDecode2($sContent);
	if (!$sData) {
		$sData = durGZDecode($sContent);
	}

	return $sData ? $sData : $sContent;
}

function durOutputCompress($sContent)
{
	if (!defined('DUR_OUTPUT_COMPRESS')) {
		define('DUR_OUTPUT_COMPRESS', 'SKIP');
	}

	if (DUR_OUTPUT_COMPRESS == 'SKIP') {
		return $sContent;
	}

	$aAccept = array();
	if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
		$aAccept = array_map('trim', explode(',', strtolower($_SERVER['HTTP_ACCEPT_ENCODING'])));
	}

	$bGZIP = in_array('gzip', $aAccept) && function_exists('gzencode');
	$bDEFL = in_array('deflate', $aAccept) && function_exists('gzdeflate');
	$sCompress = DUR_OUTPUT_COMPRESS;
	if ((!$bGZIP && !$bDEFL) || (!$bGZIP && ($sCompress == 'GZIP')) || (!$bDEFL && ($sCompress == 'DEFLATE'))) {
		$sCompress = 'NONE';
	}

	if ($sCompress == 'AUTO') {
		$sCompress = $bGZIP ? 'GZIP' : ($bDEFL ? 'DEFLATE' : 'NONE');
	}

	switch ($sCompress) {
	case 'GZIP':
		header('Content-Encoding: gzip');
		$sContent = gzencode($sContent);
		break;

	case 'DEFLATE':
		header('Content-Encoding: deflate');
		$sContent = gzdeflate($sContent, 9);
		break;

	default:

		// header('Content-Encoding: none');

	}

	return $sContent;
}

function durDebugEscape($sText)
{
	return str_replace(array(
		'--',
		'-->'
	) , array(
		'==',
		'==}'
	) , $sText);
}

function durDebugVar($mVar, $sPref = '  ')
{
	$Ret = '';
	foreach($mVar as $sKey => $sVal) {
		$Ret.= "{$sPref}{$sKey} => ";
		if (is_array($sVal)) {
			$Ret.= "ARRAY (\n" . durDebugVar($sVal, $sPref . '  ') . "{$sPref})\n";
		}
		else {
			$Ret.= "{$sVal}\n";
		}
	}

	return durDebugEscape($Ret);
}

function durLinkChanger($sContent)
{
	global $aURFlip, $aURLRewriter, $aURLRewriterOnly;
	if (DUR_SKIP_THIS) return $sContent;
	if (strlen($sContent) < 500) return $sContent;
	if (DUR_CACHE_REWRITED && file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-cache')) {

		// / ������ ����������� �������� - start

		$aDataStore = array();
		$icachedays = DUR_CACHE_TIME * 60 * 60 * 24;
		$sMD5Content = md5($sContent); // MD5 �� �������� ���������� ����� ����� ����� ����; ��� �������� ����� ��� ������ �������� � ������ �������� � ����
		$sCacheFName = $_SERVER['DOCUMENT_ROOT'] . '/d-cache/' . $sMD5Content . '.html.cache'; // ��� ����� ���� �������� ��������
		$sTimeFName = $_SERVER['DOCUMENT_ROOT'] . '/d-cache/time.cache'; // ��� ����� ������ ����
		$aStoredData = array();
		$aStoredData = unserialize(file_get_contents($sTimeFName)); // ������ �� ����� ������ ����
		$timestamp = $aStoredData['d_scripts_time']; // ����� ���������� ��������� ������ d-seo � d-url-rewriter
		$tOverallLenght = $aStoredData['cache_weight']; // ���������� ����� ����� �� �����
		$tLastClear = $aStoredData['last_clear_time'];
		$dtimestamp = filemtime($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php'); // ����� ��������� d-url-rewriter

		// ���� ���� ���� d-seo, �� ����� ��� ����� ��������� � ���������� � ���������� $dtimestamp �������� �� ������� ���������� ��������� ��������

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php')) {
			$dTMPtimestamp = filemtime($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php');
			if ($dTMPtimestamp > $dtimestamp) $dtimestamp = $dTMPtimestamp;
		}

		// ���� ����� ���������� ���������, ���������� � ���� ������ ���� ���������� �� ���������, ������ ���� ���.

		if ($timestamp != $dtimestamp || $tOverallLenght > DUR_CACHE_MEMORY || time() - $tLastClear > $icachedays) {
			if ($dh = @opendir($_SERVER['DOCUMENT_ROOT'] . '/d-cache/')) {
				while (($obj = readdir($dh)) !== false) {
					if ($obj == '.' || $obj == '..') continue;
					@unlink($_SERVER['DOCUMENT_ROOT'] . '/d-cache/' . $obj);
				}

				closedir($dh);
			}

			$aDataToStore['d_scripts_time'] = $dtimestamp; // ���������� � ������ ����� ���������� ��������� ������ d-seo � d-url-rewriter
			$aDataToStore['last_clear_time'] = $tLastClear = time();
			$aDataToStore['cache_weight'] = $tOverallLenght = 0;
			file_put_contents($sTimeFName, serialize($aDataToStore));
		}
	}

	// ���� ���� �����. ���� � ����, ���������� ��� ���������� � $sContent

	if (isset($sCacheFName) && file_exists($sCacheFName)) {
		$sContent = file_get_contents($sCacheFName);
	}

	// / ������ ����������� �������� - break

	else {
		$iTimeStart = microtime(true);
		$sContent = durGZCheck($sContent);
		if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'JOOMLA') && isset($_SERVER['dur'])) {
			$aURLRewriter = $_SERVER['dur'][0];
			$aURFlip = $_SERVER['dur'][1];
			$aURLRewriterOnly = $_SERVER['dur'][2];
			unset($_SERVER['dur']);
		}

		$aURLRewriter = array_merge($aURLRewriter, $aURLRewriterOnly);

		// Base path

		if (preg_match('%<[^<>]*base[^<>]*href=[\'"]?([\w_\-\.\:/]+)[\'"\s>][^<>]*>%siU', $sContent, $aM)) {
			$sBase = $aM[1];
			$sBaseHref = $aM[1];
		}
		else {
			$sBase = 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
			$sBaseHref = '';
		}

		$sBase = trim(str_replace(array(
			'http://',
			'https://'
		) , '', $sBase) , '/');
		$aHosts = array(
			$_SERVER['HTTP_HOST']
		);
		if (substr($_SERVER['HTTP_HOST'], 0, 4) == 'www.') {
			$aHosts[] = substr($_SERVER['HTTP_HOST'], 4);
		}

		if (defined('DUR_SUBDOMAINS') && DUR_SUBDOMAINS) {
			$sExtHost = str_replace('www.www.', 'www.', 'www.' . DUR_SUBDOMAINS);
			$aHosts[] = $sExtHost;
			$aHosts[] = str_replace('www.', '', $sExtHost);
		}

		$aHosts = array_unique($aHosts);
		$sBase = str_replace($aHosts, '', $sBase);

		// href="?..."

		if (defined('DUR_LINK_PARAM') && defined('DUR_ORIG_RURI') && DUR_LINK_PARAM) {
			$sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*([?#].*[#\'"\s>])%siU', '$1' . DUR_ORIG_RURI . '$2', $sContent);
		}

		if (defined('DUR_FIX_HTTP_HOST') && DUR_FIX_HTTP_HOST) {
			$aHosts = array(
				DUR_FIX_HTTP_HOST
			);
			$sFalseHost = str_replace('www.www.', '', 'www.' . DUR_FIX_HTTP_HOST);
			$sContent = str_replace('http://' . $sFalseHost, 'http://' . DUR_FIX_HTTP_HOST, $sContent);
		}

		// Main cicle

		if (defined('DUR_MAIN_CYCLE')) {
			if (DUR_MAIN_CYCLE == 'str_replace' || DUR_MAIN_CYCLE == 'callback') {

				// /������������ ������, ��� ������ �� ����� ������ ������ � ���� href="http://HTTP_HOST/REQUEST_URI"   , �.�. � ��������, ��� �������� � � ������
				// /��������� ���������� �����

				$sContent = preg_replace('#\shref\s*=[\s]?([A-Za-z0-9\?\/][^\s]*)(\s|/>|>)#siU', ' href="http://' . DUR_FIX_HTTP_HOST . '/$1"$2', $sContent);
				$sContent = preg_replace('#\shref\s*=[\s]?"([A-Za-z0-9\?\/][^"]*)"#siU', ' href="http://' . DUR_FIX_HTTP_HOST . '/$1"', $sContent);
				$sContent = preg_replace('#\shref\s*=[\s]?\'([A-Za-z0-9\?\/][^"]*)\'#siU', ' href="http://' . DUR_FIX_HTTP_HOST . '/$1"', $sContent); // ������� href � ��������� ��������
				$sContent = str_replace(array(
					'http://' . DUR_FIX_HTTP_HOST . '/http://' . DUR_FIX_HTTP_HOST . '',
					'http://' . DUR_FIX_HTTP_HOST . '//',
					'http://' . DUR_FIX_HTTP_HOST . '/http',
					'http://' . DUR_FIX_HTTP_HOST . '/mailto:',
					'http://' . DUR_FIX_HTTP_HOST . '/skype:',
					'http://' . DUR_FIX_HTTP_HOST . '/tel:',
					'http://' . DUR_FIX_HTTP_HOST . '/javascript',
				) , array(
					'http://' . DUR_FIX_HTTP_HOST . '',
					'http://' . DUR_FIX_HTTP_HOST . '/',
					'http',
					'mailto:',
					'skype:',
					'tel:',
					'javascript',
				) , $sContent);

				// / - end

			}

			if (DUR_MAIN_CYCLE == 'str_replace') {
				foreach($aURLRewriter as $sFrom => $sTo) {
					if (strpos($sContent, 'href="http://' . DUR_FIX_HTTP_HOST . $sFrom . '"')) $sContent = str_replace('href="http://' . DUR_FIX_HTTP_HOST . $sFrom . '"', 'href="http://' . DUR_FIX_HTTP_HOST . $sTo . '"', $sContent);
				}
			}
			else
			if (DUR_MAIN_CYCLE == 'callback') {
				function durMainCycleCallback($href)
				{
					global $aURLRewriter;
					if (isset($aURLRewriter[$href[1]])) return 'href="http://' . DUR_FIX_HTTP_HOST . $aURLRewriter[$href[1]] . '"';
					else return $href[0];
				}

				$sContent = preg_replace_callback('#href="http://' . DUR_FIX_HTTP_HOST . '([^"]*)"#siU', 'durMainCycleCallback', $sContent);
				function durMainCycleCallback2($href)
				{ // ��������� ��������� �������
					global $aURLRewriter;
					if (isset($aURLRewriter[$href[1]])) return 'href=\'http://' . DUR_FIX_HTTP_HOST . $aURLRewriter[$href[1]] . '\'';
					else return $href[0];
				}

				$sContent = preg_replace_callback('#href=\'http://' . DUR_FIX_HTTP_HOST . '([^\']*)\'#siU', 'durMainCycleCallback2', $sContent);
			}
			else
			if (DUR_MAIN_CYCLE == 'ortodox') {
				foreach($aHosts as $sHost) {
					foreach($aURLRewriter as $sFrom => $sTo) {
						$sContent = durReplaceLink($sHost, $sBase, $sFrom, $sTo, $sContent);
					}

					if (!defined("DUR_FIRST_TIC")) define("DUR_FIRST_TIC", true);
				}
			}
			else {
				$sContent.= "<!--Nothing to do here!-->";
			}
		}

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php')) {
			include_once ($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php');

		}

		if ((defined('DUR_BASE_ROOT') && DUR_BASE_ROOT) || !empty($sBaseHref)) {
			if (strlen(DUR_BASE_ROOT) > 7) {
				$sBaseHref = DUR_BASE_ROOT;
			}
			else {
				$sBaseHref = (empty($sBaseHref) ? 'http://' . $aHosts[0] : $sBaseHref) . '/';
			}

			$sBaseHref = trim($sBaseHref, '/') . '/';
			$sBaseHref = '<base href="' . $sBaseHref . '">';
			$sContent = preg_replace('%<base[^>]+href[^>]+>%siU', '', $sContent);
			$sContent = preg_replace('%(<head[^>]*>)%siU', "$1" . $sBaseHref, $sContent);
		}

		if (defined('DUR_ANC_HREF') && DUR_ANC_HREF) {
			$sContent = preg_replace('%(href\s*=\s*["\']+)(#\w)%siU', '$1' . DUR_REQUEST_URI . '$2', $sContent);
		}

		if (defined('DUR_ROOT_HREF') && DUR_ROOT_HREF) {
			$sContent = preg_replace('%(href\s*=\s*["\']*)\./(\w)%siU', '$1http://' . $_SERVER['HTTP_HOST'] . $sBase . '/$2', $sContent);
		}

		if (function_exists('durOtherReplacer')) {
			$sContent = durOtherReplacer($sContent);
		}
	}

	if (DUR_CACHE_REWRITED && file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-cache')) {

		// / ������ ����������� �������� - continue

		file_put_contents($sCacheFName, $sContent);

		//       $aDataToStore = $aStoredData;

		$aDataToStore['last_clear_time'] = $tLastClear;
		$aDataToStore['d_scripts_time'] = $dtimestamp;
		$aDataToStore['cache_weight'] = (int)$tOverallLenght + (int)strlen($sContent);
		file_put_contents($sTimeFName, serialize($aDataToStore));

		// / ������ ����������� �������� - end

	}

	if (defined('DUR_DEBUG') && DUR_DEBUG) {
		$sContent.= "\n<!--\n";
		if (defined('DUR_DEBUG_BEFORE') && DUR_DEBUG_BEFORE) {
			$sContent.= " ===== VARS BEFORE REWRITE =====\n\n" . DUR_DEBUG_BEFORE;
		}

		$sContent.= "===== VARS AFTER REWRITE =====\n\nSERVER:\n" . durDebugVar($_SERVER) . "\n\nGET:\n" . durDebugVar($_GET) . "\n\nREQUEST:\n" . durDebugVar($_REQUEST) . "\n";
		$sContent.= "\nCONSTANTS:\n" . '  DUR_REQUEST_URI     => ' . durDebugEscape(DUR_REQUEST_URI) . "\n" . '  DUR_HTTP_HOST       => ' . durDebugEscape(DUR_HTTP_HOST) . "\n" . '  DUR_FULL_URI        => ' . durDebugEscape(DUR_FULL_URI) . "\n" . '  DUR_ORIG_RURI       => ' . (defined('DUR_ORIG_RURI') ? durDebugEscape(DUR_ORIG_RURI) : 'NOT-SET') . "\n" . '  DUR_SEO_REQUEST_URI => ' . (defined('DUR_SEO_REQUEST_URI') ? durDebugEscape(DUR_SEO_REQUEST_URI) : 'NOT-SET') . "\n";
		$iTimeNow = microtime(true);
		$iTimeAll = ($iTimeNow - DUR_TIME_START) / 1000;
		$iTimeContent = ($iTimeStart - DUR_TIME_START) / 1000;
		$iTimeLinks = ($iTimeNow - $iTimeStart) / 1000;
		$sContent.= "\nTIME:\n" . '  ALL: ' . number_format($iTimeAll, 8) . " sec. (100%)\n" . '  CMS: ' . number_format($iTimeContent, 8) . ' sec. (' . number_format($iTimeContent / $iTimeAll * 100, 2) . "%)\n" . '  DUR: ' . number_format($iTimeLinks, 8) . ' sec. (' . number_format($iTimeLinks / $iTimeAll * 100, 2) . "%)\n";
		$sContent.= "\nD-Data:\n" . durDebugVar($aDataToStore);
		$sContent.= '-->';
	}

	$sContent = durOutputCompress($sContent);
	if (defined('DUR_FIX_CONTLEN') && DUR_FIX_CONTLEN) {
		header('Content-Length: ' . strlen($sContent));
	}

	return $sContent;
}

function outerlinks($matches)
{
	$sEq = false; //���� �� ����������
	$res = $matches[0];
	$arMassNotNoindex = array(
		'%demis.ru%siU',
		'%demis-promo.ru%siU',
		'%\shref\s*=\s*[\'"]https?:\/\/[A-Za-z0-9-]*\.?' . DUR_FIX_HTTP_HOST . '%siU',
	);
	foreach($arMassNotNoindex as $item) {
		if (preg_match($item, $matches[0])) {
			$sEq = true;
			break;
		}
	}

	if (!$sEq) { // ���� ���������� �� �������

		// $res = '<noindex>'.$matches[0].'</noindex>';
		// ���� ����������� rel, �� ��������� ���

		if (!strpos($res, 'rel=')) {
			$res = str_replace('<a ', '<a rel=nofollow ', $res);
		}
	}

	return $res;
}

function durOtherReplacer($sContent)
{

	// ��������� ��������� ������ � �������� � ��������
	// $sContent = preg_replace_callback('%<a[^>]*href=[\'"]?https?://.*</a>%siU','outerlinks',$sContent);
	// $sContent = str_replace(array('<b>','</b>','<u>','</u>',),array('<span style="font-weight: bold;">','</span>','<span style="text-decoration: underline;">','</span>',),$sContent);

	$sContent = str_replace('+7 (499) 136-11-30', '+7 (495) 799-60-14',$sContent);
	$sContent = preg_replace('#<strong><em>(.*)</em></strong>#siU', '<span class="item" style="font-weight: bold; font-style: italic;">$1</span>',$sContent);

	$sContent = str_replace('<strong style="font-size: 22px;">�������� ������</strong>', '<span style="font-size: 22px; font-weight: bold;">�������� ������</span>',$sContent);

	$sContent = str_replace('<h3><span class="vt_heading1"><span class="vt_heading2">
  ���������    </span></span></h3>', '',$sContent);

	if($_SERVER['REQUEST_URI']=='/'){
		$sContent = str_replace('<h3><span class="vt_heading1"><span class="vt_heading2"> ���� ������</span></span></h3>', '<div style="text-align: center; margin-bottom: 0px; font-size: 48px; "><span class="vt_heading1"><span class="vt_heading2"> ���� ������</span></span></div>',$sContent);
		$sContent = preg_replace('#<h3>(.*)</h3>#siU', '<div style="text-align: center; margin-bottom: 0px; font-size: 24px !important;">$1</div>',$sContent);
		$sContent = preg_replace('#<h4(.*)>(.*)</h4>#siU', '<div $1 style="font-weight: bold; display: inline-block !important; padding: 0px; width: 100%; clear: both; font-size: 16px; ">$2</div>',$sContent);
       $sContent = str_replace('<center><h1>������ ���� �� ���!</h1> <br></center>', '<center><div style="font-size: 180%; line-height: 1em; margin: 0px 0; padding: 0px 0px 0px 0px; font-weight: normal;">������ ���� �� ���!</div> <br></center>',$sContent);
      $sContent = str_replace('<h2>��� ������ �������� ��������� ������� ����� "������ �� ����" � �������� ������ � 10% �� ��� ���������� ������.</h2>', '<div style="margin: 0px 0; padding: 0px 0px 0px 0px; font-weight: normal; font-size: 160%; line-height: 1em;">��� ������ �������� ��������� ������� ����� "������ �� ����" � �������� ������ � 10% �� ��� ���������� ������.</div>',$sContent);
      $sContent = str_replace('<h2>����������� ����� ��������� �� ��������.</h2>', '<div style="margin: 0px 0; padding: 0px 0px 0px 0px; font-weight: normal; font-size: 160%; line-height: 1em;">����������� ����� ��������� �� ��������.</div>',$sContent);

	}
	if($_SERVER['REQUEST_URI']=='/elektrik-na-dom.html'){
		$sContent = preg_replace('#<div class="vt_heading_style">(.*)</div>#siU', '',$sContent);
	}
	// $sContent = str_replace('<h1>��������! �����!</h1>', '<h1>������ ���� �� ��� </h1>',$sContent);
	// if ($_SERVER['REQUEST_URI'] != '/'){
	// $sContent = str_replace('<h1>������ ���� �� ��� </h1>', '',$sContent);
	// }

	return $sContent;
}

/* ����������� � ������ �����

// ��� ---

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php')) {
include_once($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php');
durRun ();
}

// --- ���

/* ��� ���������� ������� ���� �����������

RewriteCond %{HTTP_HOST} ^www.(.{4,}.nickon.ru)$
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]

RewriteCond %{HTTP_HOST} ^(.{4,}).nickon.ru$
RewriteRule ^robots\.txt$ robots-%1.txt [L]

*/
/* ����������� � ������ ������ �����
RemoveHandler .html .htm
AddType application/x-httpd-php .php .htm .html .phtml
php_value auto_prepend_file "d-url-rewriter.php"
*/

