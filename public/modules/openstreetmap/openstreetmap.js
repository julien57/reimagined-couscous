if (document.getElementById('map')) {

    var map = L.map('map', { dragging: !L.Browser.mobile, tap: !L.Browser.mobile }).setView([longitude, latitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '<a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        crossOrigin: true
    }).addTo(map);


    var LeafletIcon= L.Icon.extend({
        options: {
            iconSize: [38, 95],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76]
        }
    })


    var marker = L.marker([longitude, latitude]).addTo(map);
    marker.bindPopup(infobulle).openPopup();

    L.control.scale({
        metric: true,
        imperial: false,
        position: 'topright'
    }).addTo(map);

    if (logo_map) {
        L.Control.Watermark = L.Control.extend({
            onAdd: function(map){
                var img = L.DomUtil.create('img');
                img.src = `/uploads/${logo_map}`;
                img.style.width = '200px';
                return img;
            },
            onRemove:function(map){},
        });
    }

    L.control.watermark = function(opts){
        return new L.Control.Watermark(opts);
    }
    L.control.watermark({position:'bottomleft'}).addTo(map);
}