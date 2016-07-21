<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlayerController extends Controller
{
    public function index($movieSlug){
        $movie=Movie::whereSlug($movieSlug)->first();
        $linkGoogle=$movie->movielinks()->whereProvider('Google Drive')->first()->link;
        $codeOpenload=$movie->movielinks()->whereProvider('Openload')->first()->link;
        $linkOpenload='https://openload.co/embed/'.$codeOpenload.'/';
//        $link= $this->getPhotoGoogle('https://r6---sn-i3b7kn7s.googlevideo.com/videoplayback?id=e01af5b1f753a7bf&itag=18&source=webdrive&begin=0&requiressl=yes&mm=30&mn=sn-i3b7kn7s&ms=nxu&mv=m&nh=IgpwcjA1LmhrZzAxKgkxMjcuMC4wLjE&pl=20&mime=video/mp4&lmt=1447838355897540&mt=1468636891&ip=14.177.224.90&ipbits=8&expire=1468665806&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,nh,pl,mime,lmt&signature=3A382A27FB1772C4EFF7D8960CFF207A3C3D22B7.05DA711B6EC647C8622D127C98D3A6FE35F64CCE&key=ck2&cpn=kntesdoJli_-55Fx&c=WEB&cver=1.20160714');
//        dd($link);
        return view('play',compact('movie','linkGoogle','linkOpenload'));
    }

    private function getPhotoGoogle($link) {
        $get = $link;
        $data = explode('url\u003d', $get);
        if (!isset($data[1])) {
            return false;
        }
        $url = explode('%3Dm', $data[1]);
        $decode = urldecode($url[0]);
        $count = count($data);
        $linkDownload = array();
        if ($count > 4) {
            $v1080p = $decode . '=m37';
            $v720p = $decode . '=m22';
            $v360p = $decode . '=m18';
            $v480p = $decode . '=m59';
            if (!check_error_status(get_headers($v1080p))) {
                $linkDownload['1080'] = $v1080p;
            }
            if (!check_error_status(get_headers($v720p))) {
                $linkDownload['720'] = $v720p;
            }
            if (!check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 3) {
            $v720p = $decode . '=m22';
            $v360p = $decode . '=m18';
            $v480p = $decode . '=m59';
            if (!check_error_status(get_headers($v720p))) {
                $linkDownload['720'] = $v720p;
            }
            if (!check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 2) {
            $v360p = $decode . '=m18';
            $v480p = $decode . '=m59';
            if (!check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 1) {
            $v360p = $decode . '=m18';
            if (!check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        return $linkDownload;
    }

}
