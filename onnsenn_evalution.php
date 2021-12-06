<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
   <title>♨温泉評価・マッチング♨</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/onnsenn.png">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
　<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/onnsenn.css">
</head>
<body>
    <header>
        <div class="title" style="background-color:skyblue;" id="search">
            <h1>♨温泉評価・マッチング</h1>
        </div>
    <div id="header" class="fixed-top" style="height:30px; background-color: #d4ebec;">
        <a href="#search">検索欄</a>
        <a href="#match">温泉マッチング</a>
        <a href="#matchgraph">マッチ一覧</a>
        <a href="#on-add">評価追加</a>
        <a href="#contact">お問い合わせ</a>
        <a href="#all">温泉一覧表示</a>
    </div>
    </header>
    <div id="map"></div>
    
    <script>
var map;
function initMap(){
    var lating=new google.maps.LatLng(33.533534,130.468826);
    map = new google.maps.Map(document.getElementById('map'),{
        zoom:10,
        center:lating
    });
    var markerData = [
<?php
    $link =mysqli_connect('tsuruhisa.naviiiva.work','naviiiva_user','!Samurai1234','tsuruhisa');
    $sql = "select * from onnsenn";
    if ($result = mysqli_query($link, $sql)) {
        foreach($result as $row) {
            echo "{'Lat':".$row['lat'].",'Lng':".$row['lng']."},";
        }
    }
?>
    ];
    for (var i = 0; i < markerData.length; i++) {
        var latlng=new google.maps.LatLng(markerData[i].Lat,markerData[i].Lng);
         var marker = new google.maps.Marker({
              position: latlng,
              map: map
         });
    }
}
    function search()
    {
        var search_name = document.getElementById("search_name").value;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': search_name
        }, function(results, status){
            if(status === google.maps.GeocoderStatus.OK){
                map.setCenter(results[0].geometry.location);
            }
        });
    }
    </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjdDVZRBeID0dCq2RnckK8Gl1iWQp6Jmc&callback=initMap"></script>
    
    <div class="form-group">
        <div class="row" >
            <div class="col-8">
              <input type="text" id="search_name" class="form-control" placeholder="温泉名、住所">  
            </div>
            <div class="col-4">
              <input type="buttpn" name="submit"  value="検索"class="btn btn-outline-primary" onclick="search()">
            </div>
        </div>
　　</div>
　　
　　<h2 class="text-center"id="match">温泉マッチング</h2>
　　<div class="match">
　　<p class="text-center">好みによってを温泉を紹介します！温泉を選ぶ際に何を重要視するのかを選んでください！</p>
　　　　<form action="onnsenn_evalution.php" method="post" class="getmatch">
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">人の多さ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="manypepleM" name="manypepleM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">広さ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="widthM" name="widthM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">きれいさ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="cleanM" name="cleanM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">サウナの満足度</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="saunaM" name="saunaM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
            <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">交通の便</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="trafficM" name="trafficM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">温泉の質</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="qualityM" name="qualityM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">岩盤浴</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="bedrockM" name="bedrockM" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>

    　  <div class="text-center">
     <input type="submit" name="match"  value="マッチ" id='match' class="btn btn-outline-primary">
    </div>
　</form> 
　
　　</div>
　　
　　  <h2 id="graph">温泉マッチ結果</h2>
   <table class="graph" id="matchgraph">
        <tr class="table2">
            <th class="graph">温泉名</th>
            <th class="graph">住所</th>
            <th class="graph">料金</th>
            <th class="graph">その他</th>
        </tr>
  <?php
$link =mysqli_connect('tsuruhisa.naviiiva.work','naviiiva_user','!Samurai1234','tsuruhisa');
if(mysqli_connect_errno()){
    die("データベースに接続できません:".mysqli_connect_errno()."\n");
}
 
                  if(isset($_POST['match'])){
            $manypepleM=$_POST['manypepleM'];
        $widthM=$_POST['widthM'];
        $cleanM=$_POST['cleanM'];
        $saunaM=$_POST['saunaM'];
        $trafficM=$_POST['trafficM'];
        $qualityM=$_POST['qualityM'];
        $bedrockM=$_POST['bedrockM'];
        
        $sql="select yuname, address, fee, other from onnsenn where  $manypepleM< manypeople and $widthM<width and $cleanM<clean and $saunaM<sauna and $trafficM<traffic and $qualityM<quality and $bedrockM<bedrock";
         if ($result = mysqli_query($link, $sql)) {
         // データが取得できた
       foreach($result as $row){
           echo "<tr class='gragh'>";
       foreach($row as $cell){
            echo '<th class="graph">';
           echo $cell;
           echo "</th>";
       }
       echo "</tr>";
       echo "<br>\n";
        }
           }
        }
mysqli_close($link);
?>
</table>
　　

　　
　　
　　<h2 class="text-center" id="on-add">----------温泉評価追加-----------</h2>
　　<form action="onnsenn_evalution.php" method="post" class="add">
　 <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">温泉名</p>
          </div>
          <div class="col-md-8">
           <label><input type="text" class="form-control" id="yuname" name="yuname"></label>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">住所</p>
          </div>
          <div class="col-md-8">
           <label><input type="text" class="form-control" id='address' name='address'></label>
          </div>
    　  </div>
    </div>

    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">人の多さ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="manypeple" name="manypeple" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">広さ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="width" name="width" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">きれいさ</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="clean" name="clean" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">サウナの満足度</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="sauna" name="sauna" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
            <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">交通の便</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="traffic" name="traffic" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">温泉の質</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="quality" name="quality" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">岩盤浴</p>
          </div>
          <div class="col-md-8">
           <div class="range"><input type="range" min ="0" max="100" value="50" id="bedrock" name="bedrock" class="custom-range">
           <span class="rangenum">50</span>
           </div>
          </div>
    　  </div>
    </div>
     <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">値段</p>
          </div>
          <div class="col-md-8">
           <label><input type="text" class="form-control" id="price" name="price"></label>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">その他の特徴</p>
          </div>
          <div class="col-md-8">
           <label><input type="text" class="form-control" id="feature" name="feature"></label>
          </div>
    　  </div>
    </div>
    　  <div class="text-center">
     <input type="submit" name="add"  value="登録" id="formreg" class="btn btn-outline-primary">
    </div>
　</form> 
　
　<script>
var inputRange=document.getElementsByClassName('custom-range');
var changeNum=document.getElementsByClassName('rangenum');

var setCurrentValue=(idx, value)=>{
    changeNum[idx].innerHTML=value;
}
var rangeOnChange=(e)=>{
    var idx = -1;
    for (var i = 0;i < inputRange.length; i++) {
        if (inputRange[i] == e.target) {
            idx = i;
            break;
        }
    }
    setCurrentValue(idx, e.target.value);
}

window.addEventListener('load', function(){
    for (var i = 0;i < inputRange.length; i++) {
        inputRange[i].addEventListener('input',rangeOnChange);
        //setCurrentValue(inputRange);
    }
})
　</script>
　<?php
    $link =mysqli_connect('tsuruhisa.naviiiva.work','naviiiva_user','!Samurai1234','tsuruhisa');
     if(mysqli_connect_errno()){
        die("データベースに接続できません:".mysqli_connect_errno()."\n");
    }else{  
        
     if(isset($_POST['add'])){
        $yuname=$_POST['yuname'];
        $address=$_POST['address'];
        
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $myKey="AIzaSyCjdDVZRBeID0dCq2RnckK8Gl1iWQp6Jmc";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . $myKey ;
        $contents= file_get_contents($url);
        $jsonData = json_decode($contents,true);
        $lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $lng = $jsonData["results"][0]["geometry"]["location"]["lng"];
        
        $manypeple=$_POST['manypeple'];
        $width=$_POST['width'];
        $clean=$_POST['clean'];
        $sauna=$_POST['sauna'];
        $traffic=$_POST['traffic'];
        $quality=$_POST['quality'];
        $bedrock=$_POST['bedrock'];
        $price=$_POST['price'];
        $other=$_POST['feature'];
        
        $insert = "insert into onnsenn(yuname,address,lat,lng,manypeople,width,clean,sauna,traffic,quality,bedrock,fee,other) values('$yuname','$address','$lat','$lng','$manypeple','$width','$clean','$sauna','$traffic','$quality','$bedrock','$price','$other')";

        if (!mysqli_query($link, $insert)) {
            // 失敗したとき
            echo $insert."<br>";
            die("データベースに登録できません:".mysqli_connect_errno()."\n");
        } else {
            $id = mysqli_insert_id($link);
            if ($id > 0) {
                echo "<script>alert('登録に成功しました');</script>";
            } 
        }
     }
   
        
     mysqli_close($link);
    }
    ?>
　　<div class="all-onnsenn" id="all">
　　    　　  <h2 id="graph">温泉一覧</h2>
             <form action="onnsenn_evalution.php" method="post" class="ichiran">
　　    　　      <input type="submit" name="graph"  value="一覧表示" id="graph" class="btn btn-outline-primary">
　　    　　  </form>
   <table class="graph2" id="all">
        <tr class="table2">
            <th class="graph">温泉名</th>
            <th class="graph">住所</th>
            <th class="graph">料金</th>
            <th class="graph">その他</th>
        </tr>
　　</div>
　　<?php
    $link =mysqli_connect('tsuruhisa.naviiiva.work','naviiiva_user','!Samurai1234','tsuruhisa');
     if(mysqli_connect_errno()){
        die("データベースに接続できません:".mysqli_connect_errno()."\n");
    }else{ 
        if(isset($_POST['graph'])){
            
        
   $sql2="select  yuname, address, fee, other from onnsenn";
    

if ($result = mysqli_query($link, $sql2)) {
         // データが取得できた
       foreach($result as $row){
           echo "<tr class='gragh'>";
       foreach($row as $cell){
            echo '<th class="graph">';
           echo $cell;
           echo "</th>";
       }
       echo "</tr>";
       echo "<br>\n";
        }
           }
    }
    }
mysqli_close($link);
?>
</table>
        
    
        
　　
　　 <div id='contact' class="m-5">
      <div class="text-center">
      <h2 class="py-5">お問い合わせフォーム</h2>
      </div>
  <form action="onnsenn.php" method="post" >
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">名前</p>
          </div>
          <div class="col-md-8">
           <label><input type="text" name="name" class="form-control"></label>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">メールアドレス</p>
          </div>
          <div class="col-md-8">
           <label><input type="email" name="mail" class="form-control"></label>
          </div>
    　  </div>
    </div>
    <div class="form-group">
        <div class="row">
          <div class="col-md-4">
           <p class="text-center">お問い合わせ内容</p>
          </div>
          <div class="col-md-8">
          <label><textarea name="message" class="w-auto" rows="6" cols="40"></textarea></label>
          </div>
    　  </div>
    </div>
    <div class="text-center">
      <input type="submit" name="submit"  value="送信"class="btn btn-outline-primary">
    </div>
  </form>
  </div>
  <?php
  
  $erromessage=array();
  if(isset($_POST['submit'])){
      if(!$_POST['name']){
          $erromessage[]="名前を入力してください";
      }else if(mb_strlen($_POST['name'])>100){
          $erromessage[]="名前は100文字以内で入力してください";
      }
      if(!$_POST['mail']){
          $$erromessage[]="メールアドレスを入力してください";
      }else if(mb_strlen($_POST['mail'])>200){
          $erromessage[]="メールアドレスは200文字以内で入力してください";
      }else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
          $erromessage[]="メールアドレスは不正です";
      }
       if(!$_POST['message'] ){
          $errmessage[] = "お問い合わせ内容を入力してください";
      } else if( mb_strlen($_POST['message']) > 500 ){
          $errmessage[] = "お問い合わせ内容は500文字以内にしてください";
      }
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");

      $message="お問い合わせを受けました\r\n"
      ."名前:".$_POST['name']."\r\n"
      ."メールアドレス:".$_POST['mail']."\r\n"
      ."お問い合わせ内容:". preg_replace("/\r\n|\r|\n/", "\r\n", $_POST['message']);
      $headers = 'Bcc: chikashi08104413@gmail.com' . "\r\n";
      mb_send_mail($_POST['mail'],'お問い合わせありがとうございます',$message);
      mb_send_mail('chikashi08104413@gmail.com','お問い合わせ内容になります',$message);
  }
  ?>
  <footer id="footer" class="bg-info text-center"style="height:50px; ">chikashi810@copyright</footer>
</body>
 