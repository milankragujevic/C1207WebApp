<?php

namespace App\Http\Controllers;
use App\Http\LinkGoogle\DriveLink;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoogleLinkController extends Controller
{
    private function curlPost($url, $field = array(), $timeout = 3600, $referer = false, $USERAGENT = false) {
        $post = $field ? http_build_query($field) : '';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($USERAGENT) {
            curl_setopt($curl, CURLOPT_USERAGENT, $USERAGENT);
        }
        if ($referer) {
            curl_setopt($curl, CURLOPT_REFERER, $referer);
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        $dataReturn = curl_exec($curl);
        curl_close($curl);
        return $dataReturn;
    }

    private function check_error_status($header_movie_link) {
        if (isset($header_movie_link[0]) && stripos($header_movie_link[0], '404') !== false) {
            return true;
        }
        if (isset($header_movie_link[0]) && stripos($header_movie_link[0], '403') !== false) {
            return true;
        }
        return false;
    }

    private function curlGet($url, $timeout = 3600, $referer = false, $USERAGENT = false) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($USERAGENT) {
            curl_setopt($curl, CURLOPT_USERAGENT, $USERAGENT);
        }
        if ($referer) {
            curl_setopt($curl, CURLOPT_REFERER, $referer);
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $dataReturn = curl_exec($curl);
        curl_close($curl);
        var_export($dataReturn);
        return $dataReturn;

    }

    private function getPhotoGoogle($link) {
        $get = $this->curlGet($link);
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
            if (!$this->check_error_status(get_headers($v1080p))) {
                $linkDownload['1080'] = $v1080p;
            }
            if (!$this->check_error_status(get_headers($v720p))) {
                $linkDownload['720'] = $v720p;
            }
            if (!$this->check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!$this->check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 3) {
            $v720p = $decode . '=m22';
            $v360p = $decode . '=m18';
            $v480p = $decode . '=m59';
            if (!$this->check_error_status(get_headers($v720p))) {
                $linkDownload['720'] = $v720p;
            }
            if (!$this->check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!$this->check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 2) {
            $v360p = $decode . '=m18';
            $v480p = $decode . '=m59';
            if (!$this->check_error_status(get_headers($v480p))) {
                $linkDownload['480'] = $v480p;
            }
            if (!$this->check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        if ($count > 1) {
            $v360p = $decode . '=m18';
            if (!$this->check_error_status(get_headers($v360p))) {
                $linkDownload['360'] = $v360p;
            }
        }
        return $linkDownload;
    }
    public function index($code){
        $drive=new DriveLink('https://drive.google.com/file/d/'.$code.'/view');
        $result=$drive->Drive();
        return $result;
    }
}
