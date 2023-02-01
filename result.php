<?php
$ip = htmlspecialchars($_GET['ip']);

$url = "https://ipapi.co/$ip/json/";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array("X-Custom-Header: value","Content-Type: application/json","User-Agent: Mozilla/5.0 (Linux; Android 11; SM-M307FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/97.0.4692.87 Mobile Safari/537.36 Instagram 218.0.0.19.108 Android (30/11; 420dpi; 1080x2218; samsung; SM-M307FN; m30s; exynos9611; tr_TR; 345526713)",);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$sonuc = json_decode($resp);

$region = $sonuc->region;
$country_name = $sonuc->country_name;
$postal = $sonuc->postal;
$country_calling_code = $sonuc->country_calling_code;
$currency = $sonuc->currency;
$asn = $sonuc->asn;
$org = $sonuc->org;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>İp Adresi Sonucu</title>
  </head>
  <body class="bg-primary">
   


    <div class="container">
        <div class="card mt-5 shadow-lg">
            <div class="card-body text-center">

            <h2 class=" mt-3">"<?php echo $ip; ?>" Numaralı İp Adresi Sonuçları</h2>
            Şehir: <?php echo $region; ?><br>
            Ülke İsmi: <?php echo $country_name; ?><br>
            Posta Kodu: <?php echo $postal; ?><br>
            Telefon Kodu: <?php echo $country_calling_code; ?><br>
            Para Birimi: <?php echo $currency; ?><br>
            Asn No: <?php echo $asn; ?><br>
            İnternet Sağlayıcı: <?php echo $org; ?>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>