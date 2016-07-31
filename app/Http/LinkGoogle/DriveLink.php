<?php
/**
 * Created by PhpStorm.
 * User: super
 * Date: 7/23/2016
 * Time: 10:38 AM
 */

namespace App\Http\LinkGoogle;


class DriveLink
{
    var $link;

    /**
     * DriveLink constructor.
     * @param $link
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    function curl1($url)
    {
        if (strpos($url, 'drive.google') == true) {
            if (preg_match('@https?://(?:[\w\-]+\.)*(?:drive|docs)\.google\.com/(?:(?:folderview|open|uc)\?(?:[\w\-\%]+=[\w\-\%]*&)*id=|(?:folder|file|document|presentation)/d/|spreadsheet/ccc\?(?:[\w\-\%]+=[\w\-\%]*&)*key=)([\w\-]{28,})@i', $url, $match)) {
                $id = $match[1];
                $u = 'https://drive.google.com/file/d/' . $id . '/view?pli=1';
            }
        } else {
            $u = $url;
        }

        $curl = new NEWCURL;
        $curl->get('https://www.proxfree.com/', '', 2);
        $curl->httpheader = array(
            'Referer:https://de.proxfree.com/permalink.php?url=eKcKvRAsZMJp3EkmD1K78%2Bqx%2FrqnRtIHySNzmMxUbxvJ%2FxfYKDbfQTtfxlzFz63ZA2PxrVLbAzRji7PR98co4KUo8OToTy25nhXHdedVcXsUt3WZdBKH09owwj58mvXq&bit=1',
            'Upgrade-Insecure-Requests:1',
            'Content-Type:application/x-www-form-urlencoded',
            'Cache-Control:max-age=0',
            'Connection:close',
            'Accept-Language:en-US,en;q=0.8,vi;q=0.6,und;q=0.4',

        );

        $y = ($curl->post('https://de.proxfree.com/request.php?do=go&bit=1', "pfipDropdown=default&get=$u", 4));

        return ($curl->get($y[0]["Location"], '', 2));
    }

    public function Drive()
    {
        $url = urldecode($this->link);
        $get = $this->curl1($url);
        //var_dump($get);
        $data = explode(',["fmt_stream_map","', $get);
        $data = explode('"]', $data[1]);
        $data = str_replace(array('\u003d', '\u0026'), array('=', '&'), $data[0]);
        $data = explode(',', $data);
        asort($data);
        $js = null;
        foreach ($data as $list) {
            $data2 = explode('|', $list);
            if ($data2[0] == 37) {
                $js .= '{"label": "1080p", "file": "' . preg_replace("/\/[^\/]+\.google\.com/", "/redirector.googlevideo.com", $data2[1]) . '?title=video-1080.mp4"},';
            }
            if ($data2[0] == 22) {
                $js .= '{"label": "720p", "file": "' . preg_replace("/\/[^\/]+\.google\.com/", "/redirector.googlevideo.com", $data2[1]) . '?title=video-720.mp4"},';
            }
            if ($data2[0] == 59) {
                $js .= '{"label": "480p", "file": "' . preg_replace("/\/[^\/]+\.google\.com/", "/redirector.googlevideo.com", $data2[1]) . '?title=video-480.mp4"},';
            }
            if ($data2[0] == 18) {
                $js .= '{"label": "360p", "file": "' . preg_replace("/\/[^\/]+\.google\.com/", "/redirector.googlevideo.com", $data2[1]) . '?title=video-360.mp4"},';
            }
        }
        return rtrim($js, '|');
    }
}