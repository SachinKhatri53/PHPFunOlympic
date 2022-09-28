<?php
function get_ip_and_country(){
    $ip_address = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    $ip_data = @json_decode(file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $ip_address));
    $country_name = $ip_data->geoplugin_countryName;
    return $country_name;
}
$ip = get_ip_and_country();
echo "old- " . $ip;
 if(empty(get_ip_and_country())){
        // $new = get_ip_and_country();
        echo "New- " . get_ip_and_country();
    }
echo "old- " . $ip;
?>