<!DOCTYPE html>
<!--https://github.com/sparc/phpWhois.org atualizado em 21 Dec 2020-->
<html>
<head>
<title>Username</title>
<style>
span{
    color:white;
    display:block;
}
.verde{
    background-color:green;
}
.vermelho{
    background-color:red;
}
</style>
</head>
<body>
<form method="get" action="index.php">
Digite um username e clique em "checar":<br>
<input type="text" name="user" placeholder="username" minlength="6" maxlength="15" size="15" value="<?php print @$_GET['user'];?>" pattern="[a-zA-Z0-9]+" required><br>
<input type="submit" value="Checar">
</form>
<?php
//https://twitter.com/spiderweb <- conta bloqueada
//https://twitter.com/spider <- conta bloqueada
//https://twitter.com/castle <- sei lá!
//https://help.twitter.com/en/managing-your-account/twitter-username-rules
$user = @$_GET['user'];
if(!$user){
    die('');
}
$user=trim($user);
$url='http://gettwitterid.com/?user_name='.$user.'&submit=GET+USER+ID';

/*
if(facebookExiste($user)){
    print '<span class="vermelho">';
    print 'existe facebook@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe facebook@'.$user;
    print '</span>';
}
*/
print '<br>';
if(githubExiste($user)){
    print '<span class="vermelho">';
    print 'existe github@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe github@'.$user;
    print '</span>';
}
/*
print '<br>';
if(lastExiste($user)){
    print '<span class="vermelho">';
    print 'existe lastfm@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe lastfm@'.$user;
    print '</span>';
}
*/
/*
print '<br>';
if(pinterestExiste($user)){
    print '<span class="vermelho">';
    print 'existe pinterest@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe pinterest@'.$user;
    print '</span>';
}
*/

print '<br>';
if(twitterExiste($user)){
    print '<span class="vermelho">';
    print 'existe twitter@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe twitter@'.$user;
    print '</span>';
}

print '<br>';
if(packagistExiste($user)){
    print '<span class="vermelho">';
    print 'existe packagist@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe packagist@'.$user;
    print '</span>';
}

/*
print '<br>';
if(youtubeExiste($user)){
    print '<span class="vermelho">';
    print 'existe youtube@'.$user;
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe youtube@'.$user;
    print '</span>';
}
*/
/*
print '<br>';
if(inExiste($user)){
    print '<span class="vermelho">';
    print 'existe '.$user.'.in';
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe '.$user.'.in ($2.99/$4.79)';
    print '</span>';
}
*/

print '<br>';
if(comExiste($user)){
    print '<span class="vermelho">';
    print 'existe '.$user.'.com';
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe '.$user.'.com ($5.17/$8.38)';
    print '</span>';
}

print '<br>';
if(comBrExiste($user)){
    print '<span class="vermelho">';
    print 'existe '.$user.'.com.br';
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe '.$user.'.com.br ($14.99 register/$16.34 renew)';
    print '</span>';
}

print '<br>';
if(orgExiste($user)){
    print '<span class="vermelho">';
    print 'existe '.$user.'.org';
    print '</span>';
}else{
    print '<span class="verde">';
    print 'não existe '.$user.'.org ($6.63/$10.15)';
    print '</span>';
}

function comExiste($username){
    require_once 'src/whois.main.php';
    //http://www.phpwhois.org
    //https://github.com/sparc/phpWhois.org
    $domain = $username.'.com';
    $whois = new Whois();
    $result = $whois->Lookup($domain);
    if($result['regrinfo']['registered']=='yes'){
        return true;
    }else{
        return false;
    }
}

function comBrExiste($username){
    require_once 'src/whois.main.php';
    //http://www.phpwhois.org
    //https://github.com/sparc/phpWhois.org
    $domain = $username.'.com.br';
    $whois = new Whois();
    $result = $whois->Lookup($domain);
    if($result['regrinfo']['registered']=='yes'){
        return true;
    }else{
        return false;
    }
}

function facebookExiste($username){
    $url='https://m.facebook.com/'.$username.'/?_fb_noscript=1';
    $str=urlExisteCurl($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function githubExiste($username){
    $url='https://github.com/'.$username;
    $str=urlExiste($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function inExiste($username){
    require_once 'src/whois.main.php';
    //http://www.phpwhois.org
    //https://github.com/sparc/phpWhois.org
    $domain = $username.'.in';
    $whois = new Whois();
    $result = $whois->Lookup($domain);
    if($result['regrinfo']['registered']=='yes'){
        return true;
    }else{
        return false;
    }
}

function lastExiste($username){
    $url='https://www.last.fm/user/'.$username;
    $str=urlExisteCurl($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function orgExiste($username){
    require_once 'src/whois.main.php';
    //http://www.phpwhois.org
    //https://github.com/sparc/phpWhois.org
    $domain = $username.'.org';
    $whois = new Whois();
    $result = $whois->Lookup($domain);
    if($result['regrinfo']['registered']=='yes'){
        return true;
    }else{
        return false;
    }
}

function packagistExiste($username){
    $url='https://packagist.org/users/'.$username.'/';
    $str=urlExiste($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function pinterestExiste($username){
    $url='https://www.pinterest.com/'.$username.'/';
    $str=urlExiste($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function twitterExiste($username){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://tweeterid.com/ajax.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,'input='.$username);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $str = curl_exec($ch);
    curl_close ($ch);
    if($str=='error'){
        return false;
    }else{
        return $str;
    }
}

function youtubeExiste($username){
    $url='https://www.youtube.com/c/'.$username;
    $str=urlExisteCurl($url);
    if($str){
        return true;
    }else{
        return false;
    }
}

function download($url) {
    $useragent='Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0';
    $ch = curl_init();
    //you might need to set some cookie details up (depending on the site)
    //curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_URL,$url); //set the url we want to use
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent); //set our user agent
    $result= curl_exec ($ch); //execute and get the results
    if($result){
        return $result;
    }else{
        return false;
    }
    curl_close ($ch);
}

function urlExiste($url) {
    $file_headers = @get_headers($url);
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        return false;
    }
    else {
        return true;
    }
}

function urlExisteCurl($url){
    $useragent='Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent); //set our user agent
    curl_exec($ch);
    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if (200==$retcode){
        return true;
    }else{
        return false;
    }
}
