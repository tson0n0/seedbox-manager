<?php

namespace app\Lib;

class Server extends Users
{
    
    public static function getUptime()
    {
        $data_uptime = file_get_contents('/proc/uptime');
        $data_uptime = explode(' ', $data_uptime);
        $data_uptime = trim($data_uptime[0]);

        $time = array();
        $time['min'] = $data_uptime / 60;
        $time['hours'] = $time['min'] / 60;
        $time['days'] = floor($time['hours'] / 24);
        $time['hours'] = floor($time['hours'] - $time['days'] * 24);
        $time['min'] = floor($time['min'] - $time['days'] * 60 * 24 - $time['hours'] * 60);

        $result = '';
        if ($time['days'] != 0)
            $result = $time['days'] . ' jours ';
        if ($time['hours'] != 0)
            $result .= $time['hours'] . ' h ';
        $result .= $time['min'] . ' min';

        return $result;
    }

    public static function load_average()
    {
        $load_average = sys_getloadavg();
        if ($load_average[0] < 5)
            $info_charge = '<em class="text-success">Charge faible, conditions optimales.</em>';
        elseif ($load_average[0] < 10)
            $info_charge = '<em class="text-warning">Charge élévée, risque de ralentissement sur le serveur.</em>';
        else
            $info_charge = '<em class="text-danger">Charge très élévée, risque de gros ralentissement sur le serveur.</em>';

        return array( 'load_average' => $load_average,
                      'info_charge' => $info_charge );
    }

    public function logout()
    {
        header('HTTP/1.1 401 Unauthorized');
        usleep(500000); /*sleep(1); */ /* usleep(500000) = 1/2 sec ~ 500 ms */
        echo '<script>document.location.href = \''.$this->url_redirect.'\'</script>';
        exit();
    }

    public function FileDownload($file_config_name, $conf_ext_prog)
    {
        file_put_contents('./../conf/users/'.$this->userName.'/'.$file_config_name, $conf_ext_prog);

        set_time_limit(0);
        $path_file_name = './../conf/users/'.$this->userName.'/'.$file_config_name;
        $file_name = $file_config_name;
        $file_size = filesize($path_file_name);

        ini_set('zlib.output_compression', 0);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: '.$file_size);
        ob_clean();
        flush();
        readfile($path_file_name);

        //delete file config (transdroid|filezilla) for security.
        unlink('./../conf/users/'.$this->userName.'/'.$file_config_name);
        exit;
    }

    public static function CheckUpdate()
    {
        if (!isset($_COOKIE['seedbox-manager']))
        {
            $url_repository = 'https://raw.githubusercontent.com/Magicalex/seedbox-manager/master/version.json';
            $local = json_decode(file_get_contents('./../version.json'));
            $remote = json_decode(file_get_contents($url_repository));
            if ( $local->version != $remote->version )
                $result = $remote;
            else
                $result = false;
        }
        else
            $result = false;
        return $result;
    }
}
