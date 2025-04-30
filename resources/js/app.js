import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import Swal from 'sweetalert2';

window.Swal = Swal;

// Fix marker icons (using CDN)
const DefaultIcon = new L.Icon({
    iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
    iconRetinaUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon-2x.png',
    shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41]
});
L.Marker.prototype.options.icon = DefaultIcon;

// Initialize map with smooth behavior
const map = L.map('map', {
    center: [51.505, -0.09],
    zoom: 13,
    zoomControl: false, // We'll add it later for better positioning
    smoothWheelZoom: true, // Requires plugin (see notes below)
    smoothSensitivity: 1.5 // Slower zoom
}).setView([51.505, -0.09], 13);

// Add tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Custom zoom control position
L.control.zoom({ position: 'topright' }).addTo(map);

const locateControl = L.control({ position: 'topright' });

locateControl.onAdd = () => {
    const container = L.DomUtil.create('div', 'leaflet-bar leaflet-control');
    const button = L.DomUtil.create('a', 'leaflet-control-locate', container);
    button.innerHTML = '📌';
    button.title = 'Find my location';
    button.href = '#';

    button.onclick = (e) => {
        e.preventDefault();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    map.flyTo([pos.coords.latitude, pos.coords.longitude], 16);
                    L.marker([pos.coords.latitude, pos.coords.longitude])
                        .addTo(map)
                        .bindPopup("You are here!")
                        .openPopup();
                },
                (err) => alert(`Error: ${err.message}`)
            );
        } else {
            alert("Geolocation not supported");
        }
    };
    return container;
};
locateControl.addTo(map);

// Add scale control
L.control.scale({ position: 'bottomleft' }).addTo(map);

// Add Google-like "Map" / "Satellite" toggle
const baseLayers = {
    "Map": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
    "Satellite": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}')
};
baseLayers.Map.addTo(map);
L.control.layers(baseLayers, null, { position: 'topright' }).addTo(map);

const locations = [
    { coords: [51.505, -0.09], title: "London" },
    { coords: [48.8566, 2.3522], title: "Paris" },
    { coords: [40.7128, -74.0060], title: "New York" }
];

locations.forEach(loc => {
    L.marker(loc.coords)
        .addTo(map)
        .bindPopup(`<b>${loc.title}</b>`);  // HTML content in popup
});
