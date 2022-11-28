let lat = 35.44778; // 緯度
let lng= 139.6425; // 経度
let zoom = 11; // ズームレベル

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

  fetch("./two.geojson") //2
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

  fetch("./three.geojson") //3
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

  fetch("./four.geojson") //4
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

  fetch("./five.geojson") //5
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

  fetch("./six.geojson") //6
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

    fetch("./seven.geojson") // 7
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

    fetch("./eight.geojson") //8
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

    fetch("./nine.geojson") //9
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

    fetch("./ten.geojson") //10
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

    fetch("./eleven.geojson") //11
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

    fetch("./twelve.geojson") //12
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

    fetch("./thierteen.geojson") //13
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

    fetch("./fourteen.geojson") //14
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

    fetch("./fifteen.geojson") //15
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

    fetch("./sisxteen.geojson") //16
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

    fetch("./seventeen.geojson") //17
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

    fetch("./eighteen.geojson") //18
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
