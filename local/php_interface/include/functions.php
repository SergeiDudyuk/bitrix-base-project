<?

/**
 * @param bool $relativeUrl
 * @return string
 */
function getAbsoluteUrl($relativeUrl = false)
{
    $prefix = getHost();

    if ($relativeUrl) {
        $absoluteUrl = $prefix . $relativeUrl;
    } else {
        $absoluteUrl = $prefix . $_SERVER['REQUEST_URI'];
    }

    return $absoluteUrl;
}

/**
 * @return mixed
 */
function getServerName()
{
    $site = Bitrix\Main\SiteTable::getById('s1')->fetch();
    return $site['SERVER_NAME'];
}

/**
 * @return string
 */
function getProtocol()
{
    return (CMain::IsHTTPS()) ? 'https://' : 'http://';
}

/**
 * @return string
 */
function getHost()
{
    return getProtocol() . getServerName();
}

/**
 * @param $data
 * @param bool $prent
 * @param bool $show
 */
function prent($data, $prent = true, $show = false)
{

    global $USER;

    if (isset($_REQUEST["SHOW_DEBUG"])) {
        $_SESSION["SHOW_DEBUG"] = intval($_REQUEST["SHOW_DEBUG"]);
    }

    if (!empty($_SESSION["SHOW_DEBUG"]) && !defined("SHOW_DEBUG")) {
        define("SHOW_DEBUG", $_SESSION["SHOW_DEBUG"]);
    }

    if ($USER->IsAdmin() || $show || defined("SHOW_DEBUG")) {
        echo "<pre style=\"text-align:left; margin-top: 30px; background-color:#CCC;color:#000; font-size:10px; padding-bottom: 10px; border-bottom:1px solid #000;\">\n";
        if ($prent) {
            print_r($data);
        } else {
            var_dump($data);
        }
        echo "</pre>\n";
    }
}