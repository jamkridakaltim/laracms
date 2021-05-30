<?php

use Riskihajar\Terbilang\Facades\Terbilang;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use App\Pengaturan;

if(!function_exists('rp')) {
    function rp($nominal, $prefix='', $suffix='', $decimal=0, $presisi=',', $separator='.')
    {
        return $prefix . number_format($nominal, $decimal, $presisi, $separator) . $suffix;
    }
}

if(!function_exists('terbilang')) {
    function terbilang($nominal, $suffix=' rupiah', $prefix='')
    {
        return ucfirst(Terbilang::make($nominal, $suffix, $prefix));
    }
}

if(!function_exists('numeric')) {
    function numeric($string, $cleans=[])
    {
        $result = 0;

        $result = Str::replace('.', '', $string);
        $result = Str::replace($cleans, '', $result);

        return doubleval($result);
    }
}

if(!function_exists('roman')) {
    function roman($number, $lowercase=false)
    {
        return Terbilang::roman($number, $lowercase);
    }
}

if( ! function_exists('assets') ){
    function assets($lists=[], $type='style')
    {
        $assets = [];
        $template = [
            'style' => '<link rel="stylesheet" href="%s">',
            'script' => '<script src="%s"></script>'
        ];
        foreach( (array) $lists as $src){
            if(env('APP_DEBUG')){
                $version = env('ASSET_VERSION', date('ymdhis'));
                $src .= (Str::is('*?*', $src) ? "&" : '?') . 'version=' . $version;
            }

            $assets[] = sprintf($template[$type], asset($src));
        }

        return implode("\n", $assets);
    }
}

if( ! function_exists('style') ){
    function style($lists){
        return assets($lists, 'style');
    }
}

if( ! function_exists('script') ){
    function script($lists){
        return assets($lists, 'script');
    }
}

if( ! function_exists('build_url') ){
    function build_url($appends=[], $only='*', $except=null)
    {
        $vars = request()->except('_token');
        if(is_array($only)) $vars = request()->only($only);
        if(is_array($except)){
            array_push($except, '_token');
            $vars = request()->except($except);
        }

        $vars = array_filter(array_merge($vars, $appends));

        return http_build_query($vars);
    }
}

if( ! function_exists('active_link') ){
    function active_link($key)
    {
        $result = [];
        if(is_array($key)){
            foreach($key as $i){
                $result[] = Str::is($i, request()->url());
            }
        }else{
            $result[] = Str::is($key, request()->url());
        }

        return in_array(true, $result) ? 'active' : '';
    }
}

if( ! function_exists('is_super_admin') ){
    function is_super_admin($user=null)
    {
        if(!$user){
            $user = Auth::user();
        }

        if(!$user){
            return false;
        }else{
            return in_array(object_get($user, 'level'), ['Super', 'Super Admin']);
        }
    }
}

if( ! function_exists('is_admin') ){
    function is_admin($user=null)
    {
        if(!$user){
            $user = Auth::user();
        }

        if(!$user){
            return false;
        }else{
            return in_array(object_get($user, 'level'), ['Admin', 'Super', 'Super Admin']);
        }
    }
}

if( ! function_exists('is_operator') ){
    function is_operator($user=null)
    {
        if(!$user){
            $user = Auth::user();
        }
        if(!$user){
            return false;
        }else{
            return in_array(object_get($user, 'level'), ['Operator', 'Satker']);
        }
    }
}

if( ! function_exists('tahun') ){
    function tahun()
    {
        return session('tahun') ?: date('Y');
    }
}

if( ! function_exists('bulan') ){
    function bulan()
    {
        return session('bulan') ?: date('m');
    }
}

if(!function_exists('roman')) {
    function roman($number, $lowercase=false)
    {
        return Terbilang::roman($number, $lowercase);
    }
}

if( ! function_exists('jenis_anggaran') ){
    function jenis_anggaran()
    {
        return session('jenis_anggaran') ?: 'murni';
    }
}

// if( ! function_exists('pengaturan') ){
//     function pengaturan($key, $default=null)
//     {
//         return Pengaturan::where('key', $key)->value('value') ?: $default;
//     }
// }

if( ! function_exists('date_indo') ){
    function date_indo($date)
    {
        Carbon::setLocale('id');

        $date = Carbon::parse($date);

        $l     = $date->format('l');
        $day   = $date->format('d');
        $month = $date->format('n');
        $year  = $date->format('Y');

        $l = Lang::get('date.day.' . $l).',';
        $month = Lang::get('date.month.' . $month);

        return sprintf('%02d %s %d', $day, $month, $year);
    }
}

if( ! function_exists('plain_date') ){
    function plain_date($date, $format='d/m/Y')
    {
        return Carbon::createFromFormat($format, $date);
    }
}

if( ! function_exists('plain_datetime') ){
    function plain_datetime($date, $time, $format='d/m/Y H:i:s')
    {
        $datetime = $date.' '.$time;
        return Carbon::createFromFormat($format, $datetime);
    }
}

if( ! function_exists('table_row_number') ){
    function table_row_number($paginate, $index)
    {
        return $index+1+(($paginate->currentPage()-1)*$paginate->perPage());
    }
}

if(!function_exists('selected')) {
    function selected($a, $b)
    {
        return $a == $b ? 'selected' : '' ;
    }
}
