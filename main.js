let lat = 35.41417; // 緯度
let lng= 139.3403; // 経度
let zoom = 10; // ズームレベル

let map = L.map("map"); // 地図の生成
map.setView([lat, lng], zoom); // 緯度経度、ズームレベルを設定する

  // タイルレイヤを生成し、地図に追加する
// 今回はOpenStreetMapを表示する
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
  // 著作権の表示
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}
).addTo(map);

// 外部のGeoJSONファイルを取得する
fetch("./point_Date.geojson")
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
    }).addTo(map);
  });

  fetch("./one.geojson") //1
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
    }).addTo(map);
  });
