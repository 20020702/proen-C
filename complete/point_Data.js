// 例
// 折れ線(PolyLine)の長さ



var mymap = L.map('mymap').setView([35.41417, 139.3403], 10);
var options = {
    key: '3c38d15e76c02545181b07d3f8cfccf0',
    limit: 10
  };
 
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution:
    '<a href="http://maps.gsi.go.jp/development/ichiran.html">国土地理院</a>',
    minZoom: 4,
    maxZoom: 18
    }).addTo(mymap);

    var osmGeocoder = new L.Control.OSMGeocoder({placeholder: '検索内容を入れてください'});
    mymap.addControl(osmGeocoder);

 // 外部のGeoJSONファイルを取得する
 fetch("./Point _Data.geojson")
 .then(response => response.json())
 // GeoJSONを地図に追加する
 .then(data => {
   L.geoJSON(data, {
     // ポップアップを表示する
     onEachFeature: function(feature, layer){
       // 地物の名前を取り出す
       let name = feature.properties.P29_004;
       // ポップアップに名前を表示する
       layer.bindPopup(name);
     }
   }).addTo(mymap);
});

function distance(x1, y1, x2, y2) {	// ヒュベニ式による距離概算
    rx = 6378137;			// 赤道半径(m) WGS84
    ry = 6356752.314;			// 極半径(m)   WGS84
    e2=(rx*rx-ry*ry)/rx/rx;		// 離心率 E^2
    dx = (x2-x1)*Math.PI/180;		// 経度の差をラジアン変換
    dy = (y2-y1)*Math.PI/180;		// 緯度の差をラジアン変換
    my = (y1+y2)/2.0*Math.PI/180;	// 緯度の平均をラジアン変換
    w = Math.sqrt(1-e2*Math.sin(my)*Math.sin(my));
    m = rx*(1-e2)/Math.pow(w,3);	// 子午線曲率半径
    n = rx/w;				// 卯酉線曲率半径
    return Math.sqrt(Math.pow(dy*m,2) + Math.pow(dx*n*Math.cos(my),2));
}
function latlngdist(pos1, pos2) {	// latlng形式を2変数に展開して呼ぶ
    return distance(pos1.lng, pos1.lat, pos2.lng, pos2.lat);
}
var path = [];				// クリックしたすべての点を保持する
var line = null;			// polylineオブジェクトを保持する
var lineprop = {			// polylineのプロパティ
    color: '#fd5f00', opacity: 0.6, weight: 4
};
var sMarker, gMarker;			// 始点終点マーカ
var totalDist = 0;			// 積算距離
var info = document.getElementById('info');	// 情報表示用要素
function updatedistance(delta) {	// 距離の加算を行ない結果を
    totalDist += delta;			// info要素に距離を表示する
    info.innerHTML = '距離: '+Math.round(totalDist*100)/100+'m';
}
function resetPath() {			// 初期状態に戻す
    sMarker.remove(mymap);		// 始点マーカの除去
    gMarker.remove(mymap);		// 終点マーカの除去
    line.remove(mymap);			// 軌跡Polylineの除去
    line = sMarker = gMarker = null;
    path = [];
    totalDist = 0;
    mymap.doubleClickZoom.enable();	// ダブルクリックズーム許可
    info.innerHTML = 'クリアしました';
}
function measurePath(e) {		// クリック時の主となる処理
   
    mymap.doubleClickZoom.disable();	// ダブルクリックズーム禁止
    if (path.length > 1
	&& e.latlng.lat == path[path.length-1].lat
	&& e.latlng.lng == path[path.length-1].lng) {
	// ダブルクリック等により同じ箇所で2度クリックが起きた場合は
	return null;	// 何もせず return
    }
    path.push(e.latlng);		// クリック緯度経度を配列に追加
    if (path.length == 1) {		// 始点未設定なら
	// 始点終点マーカを生成しマップに貼り付けポップアップ文字列を登録
	sMarker = L.marker(path[0]).addTo(mymap);
	gMarker = L.marker(path[0]).addTo(mymap);
	line = L.polyline(path, lineprop).addTo(mymap)	// polyline生成
	info.innerHTML = imsg;		// 情報表示
    } else {				// 2個目以後のポイント打ちなら
	line.addLatLng(e.latlng);	// polylineにクリック点を追加
	gMarker.setLatLng(e.latlng);	// 終点マーカをそこに移動
    }
    if (path.length > 1) {	// 2個以上点が打たれたら計算
	updatedistance(latlngdist(path[path.length-2], path[path.length-1]));
    }
    if (e.originalEvent.shiftKey) {	// SHIFT+クリックで
	resetPath(e);			// 終了
    }
}
function removePoint(e) {		// 1つ取消
    if (path.length > 1) {		// 2つ以上点があれば
	var rm = path.pop();		// 点保持配列の末尾を抜き取る
	updatedistance(-latlngdist(rm, path[path.length-1])); // 引き算
	line.setLatLngs(path);		// polylineの点リストを更新
	gMarker.setLatLng(path[path.length-1]);	// 終点マーカを最終点に移動
	mymap.panTo(path[path.length-1]);	// 最終点が見えるようにする
    } else {				// polylineの点が1つ以下なら
	info.innerHTML = 'ピンを立ててください'
    }
}
mymap.on('click', measurePath);		// クリックイベントで measurePath()
mymap.on('contextmenu', removePoint);	// 右クリックで removePoint()
// id="undo" のボタンクリックで「1つ取消」
document.getElementById('undo').addEventListener('click', removePoint);
// id="finish" のボタンクリックで「終了」
document.getElementById('finish').addEventListener('click', resetPath);

