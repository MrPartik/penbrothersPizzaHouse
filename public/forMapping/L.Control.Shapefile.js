(function (factory, window) {
    // define an AMD module that relies on 'leaflet'
    if (typeof define === 'function' && define.amd) {
        define(['leaflet'], function (L) {
            factory(L);
        });

        // define a Common JS module that relies on 'leaflet'
    } else if (typeof exports === 'object') {
        module.exports = function (L) {
            if (L === undefined) {
                L = require('leaflet');
            }
            factory(L);
            return L;
        };
        // attach your plugin to the global 'L' variable
    } else if (typeof window !== 'undefined' && window.L) {
        factory(window.L);
    }
}(function leafletSpinFactory(L) {
    var SpinMapMixin = {
        spin: function (state, options) {
            if (!!state) {
                // start spinning !
                if (!this._spinner) {
                    this._spinner = new Spinner(options)
                        .spin(this._container);
                    this._spinning = 0;
                }
                this._spinning++;
            } else {
                this._spinning--;
                if (this._spinning <= 0) {
                    // end spinning !
                    if (this._spinner) {
                        this._spinner.stop();
                        this._spinner = null;
                    }
                }
            }
        }
    };

    var SpinMapInitHook = function () {
        this.on('layeradd', function (e) {
            // If added layer is currently loading, spin !
            if (e.layer.loading) this.spin(true);
            if (typeof e.layer.on !== 'function') return;
            e.layer.on('data:loading', function () {
                this.spin(true);
            }, this);
            e.layer.on('data:loaded', function () {
                this.spin(false);
            }, this);
        }, this);
        this.on('layerremove', function (e) {
            // Clean-up
            if (e.layer.loading) this.spin(false);
            if (typeof e.layer.on !== 'function') return;
            e.layer.off('data:loaded');
            e.layer.off('data:loading');
        }, this);
    };

    L.Map.include(SpinMapMixin);
    L.Map.addInitHook(SpinMapInitHook);
}, window));

L.Control.Shapefile = L.Control.extend({

    onAdd: function (map) {

        var thisControl = this;
        var $file = "";
        var controlDiv = L.DomUtil.create('div', 'leaflet-control-command');

        // Create the leaflet control.
        var controlUI = L.DomUtil.create('div', 'leaflet-control-command-interior', controlDiv);

        // Create the form inside of the leaflet control.
        var form = L.DomUtil.create('form', 'leaflet-control-command-form', controlUI);
        form.action = '';
        form.method = 'post';
        form.enctype = 'multipart/form-data';

        // Create the input file element.
        var input = L.DomUtil.create('input', 'leaflet-control-command-form-input', form);
        input.id = 'file';
        input.type = 'file';
        input.name = 'uploadFile';
        input.style.display = 'none';

        L.DomEvent
            .addListener(form, 'click', function () {
                document.getElementById("file").click();

            })
            .addListener(input, 'change', function () {
                $("div[id=map-upload-confirmation]").modal('show');
                $('button[name=dismiss-upload-shapefile]').on('click', function () {
                    $("div[id=map-upload-confirmation]").modal('toggle');
                    window.location.reload();
                });
                thisControl.fileToArrayBuffer(this.files[0]);
            });

        controlUI.title = 'Upload a Shapefile';

        return controlDiv;
    },

    // When the user uploads a file, convert the file to an array buffer.
    fileToArrayBuffer: function (file) {

        var thisControl = this;

        var reader = new FileReader();

        reader.onloadend = function (e) {
            back = [
                "#63b598", "#ce7d78", "#ea9e70", "#a48a9e", "#c6e1e8", "#648177", "#0d5ac1",
                "#f205e6", "#1c0365", "#14a9ad", "#4ca2f9", "#a4e43f", "#d298e2", "#6119d0",
                "#d2737d", "#c0a43c", "#f2510e", "#651be6", "#79806e", "#61da5e", "#cd2f00",
                "#9348af", "#01ac53", "#c5a4fb", "#996635", "#b11573", "#4bb473", "#75d89e",
                "#2f3f94", "#2f7b99", "#da967d", "#34891f", "#b0d87b", "#ca4751", "#7e50a8",
                "#c4d647", "#e0eeb8", "#11dec1", "#289812", "#566ca0", "#ffdbe1", "#2f1179",
                "#935b6d", "#916988", "#513d98", "#aead3a", "#9e6d71", "#4b5bdc", "#0cd36d",
                "#250662", "#cb5bea", "#228916", "#ac3e1b", "#df514a", "#539397", "#880977",
                "#f697c1", "#ba96ce", "#679c9d", "#c6c42c", "#5d2c52", "#48b41b", "#e1cf3b",
                "#5be4f0", "#57c4d8", "#a4d17a", "#225b8", "#be608b", "#96b00c", "#088baf",
                "#f158bf", "#e145ba", "#ee91e3", "#05d371", "#5426e0", "#4834d0", "#802234",
                "#6749e8", "#0971f0", "#8fb413", "#b2b4f0", "#c3c89d", "#c9a941", "#41d158",
                "#fb21a3", "#51aed9", "#5bb32d", "#807fb", "#21538e", "#89d534", "#d36647",
                "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
                "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
                "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#21538e", "#89d534", "#d36647",
                "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
                "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
                "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#9cb64a", "#996c48", "#9ab9b7",
                "#06e052", "#e3a481", "#0eb621", "#fc458e", "#b2db15", "#aa226d", "#792ed8",
                "#73872a", "#520d3a", "#cefcb8", "#a5b3d9", "#7d1d85", "#c4fd57", "#f1ae16",
                "#8fe22a", "#ef6e3c", "#243eeb", "#1dc18", "#dd93fd", "#3f8473", "#e7dbce",
                "#421f79", "#7a3d93", "#635f6d", "#93f2d7", "#9b5c2a", "#15b9ee", "#0f5997",
                "#409188", "#911e20", "#1350ce", "#10e5b1", "#fff4d7", "#cb2582", "#ce00be",
                "#32d5d6", "#17232", "#608572", "#c79bc2", "#00f87c", "#77772a", "#6995ba",
                "#fc6b57", "#f07815", "#8fd883", "#060e27", "#96e591", "#21d52e", "#d00043",
                "#b47162", "#1ec227", "#4f0f6f", "#1d1d58", "#947002", "#bde052", "#e08c56",
                "#28fcfd", "#bb09b", "#36486a", "#d02e29", "#1ae6db", "#3e464c", "#a84a8f",
                "#911e7e", "#3f16d9", "#0f525f", "#ac7c0a", "#b4c086", "#c9d730", "#30cc49",
                "#3d6751", "#fb4c03", "#640fc1", "#62c03e", "#d3493a", "#88aa0b", "#406df9",
                "#615af0", "#4be47", "#2a3434", "#4a543f", "#79bca0", "#a8b8d4", "#00efd4",
                "#7ad236", "#7260d8", "#1deaa7", "#06f43a", "#823c59", "#e3d94c", "#dc1c06",
                "#f53b2a", "#b46238", "#2dfff6", "#a82b89", "#1a8011", "#436a9f", "#1a806a",
                "#4cf09d", "#c188a2", "#67eb4b", "#b308d3", "#fc7e41", "#af3101", "#ff065",
                "#71b1f4", "#a2f8a5", "#e23dd0", "#d3486d", "#00f7f9", "#474893", "#3cec35",
                "#1c65cb", "#5d1d0c", "#2d7d2a", "#ff3420", "#5cdd87", "#a259a4", "#e4ac44",
                "#1bede6", "#8798a4", "#d7790f", "#b2c24f", "#de73c2", "#d70a9c", "#25b67",
                "#88e9b8", "#c2b0e2", "#86e98f", "#ae90e2", "#1a806b", "#436a9e", "#0ec0ff",
                "#f812b3", "#b17fc9", "#8d6c2f", "#d3277a", "#2ca1ae", "#9685eb", "#8a96c6",
                "#dba2e6", "#76fc1b", "#608fa4", "#20f6ba", "#07d7f6", "#dce77a", "#77ecca"];
            rand = back[Math.floor(Math.random() * back.length)];

            //            console.log(e.target.result.byteLength);

            // Pass the array buffer to the shapfile-js function
            thisControl.loadArrayBuffer(e.target.result);
        };

        $file = file;
        reader.readAsArrayBuffer(file);

    },

    // Convert the array buffer to geojson and add it to the map as a layer
    loadArrayBuffer: function (buffer) {


        $('button[name=upload-shapefile]').on('click', function () {

            $("div[id=map-upload-confirmation]").modal('toggle');
            shp(buffer).then(function (geojson) {
                console.log($file);
                var layer = L.geoJSON(geojson);
                var layers = layer._layers;
                var color = rand
                //            console.log(color);
                var loaded = L.geoJSON();
                Object.keys(layers).forEach(function (key) {
                    var layer = (layers[key]);
                    console.log(layer.feature.properties);
                    loaded.addLayer(layer).addTo(map);
                    layer.setStyle({
                        fillColor: color,
                        color: color
                    });


                });
                $("#loadingFile").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $.ajax({

                    url: '../functionalities/insert_map_upload.php',
                    type: 'post',
                    data: {
                        name: $file.name,
                        desc: $file.name + " - " + $file.lastModifiedDate,
                        color: color,
                        layer: JSON.stringify(loaded.toGeoJSON(), null, 2)
                    },
                    success: function (data) {

                        $('#loadingFile').modal('toggle');
                        //                    alert("map uploaded");
                        window.location.reload();
                    },
                    error: function (data) {
                        $('#loadingFile').modal('toggle');
                        console.log(data);
                        window.location.reload();
                    }
                });
            });
        });

    }
});

L.control.shapefile = function (opts) {
    return new L.Control.Shapefile(opts);
};

back = [
                "#63b598", "#ce7d78", "#ea9e70", "#a48a9e", "#c6e1e8", "#648177", "#0d5ac1",
                "#f205e6", "#1c0365", "#14a9ad", "#4ca2f9", "#a4e43f", "#d298e2", "#6119d0",
                "#d2737d", "#c0a43c", "#f2510e", "#651be6", "#79806e", "#61da5e", "#cd2f00",
                "#9348af", "#01ac53", "#c5a4fb", "#996635", "#b11573", "#4bb473", "#75d89e",
                "#2f3f94", "#2f7b99", "#da967d", "#34891f", "#b0d87b", "#ca4751", "#7e50a8",
                "#c4d647", "#e0eeb8", "#11dec1", "#289812", "#566ca0", "#ffdbe1", "#2f1179",
                "#935b6d", "#916988", "#513d98", "#aead3a", "#9e6d71", "#4b5bdc", "#0cd36d",
                "#250662", "#cb5bea", "#228916", "#ac3e1b", "#df514a", "#539397", "#880977",
                "#f697c1", "#ba96ce", "#679c9d", "#c6c42c", "#5d2c52", "#48b41b", "#e1cf3b",
                "#5be4f0", "#57c4d8", "#a4d17a", "#225b8", "#be608b", "#96b00c", "#088baf",
                "#f158bf", "#e145ba", "#ee91e3", "#05d371", "#5426e0", "#4834d0", "#802234",
                "#6749e8", "#0971f0", "#8fb413", "#b2b4f0", "#c3c89d", "#c9a941", "#41d158",
                "#fb21a3", "#51aed9", "#5bb32d", "#807fb", "#21538e", "#89d534", "#d36647",
                "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
                "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
                "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#21538e", "#89d534", "#d36647",
                "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
                "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
                "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#9cb64a", "#996c48", "#9ab9b7",
                "#06e052", "#e3a481", "#0eb621", "#fc458e", "#b2db15", "#aa226d", "#792ed8",
                "#73872a", "#520d3a", "#cefcb8", "#a5b3d9", "#7d1d85", "#c4fd57", "#f1ae16",
                "#8fe22a", "#ef6e3c", "#243eeb", "#1dc18", "#dd93fd", "#3f8473", "#e7dbce",
                "#421f79", "#7a3d93", "#635f6d", "#93f2d7", "#9b5c2a", "#15b9ee", "#0f5997",
                "#409188", "#911e20", "#1350ce", "#10e5b1", "#fff4d7", "#cb2582", "#ce00be",
                "#32d5d6", "#17232", "#608572", "#c79bc2", "#00f87c", "#77772a", "#6995ba",
                "#fc6b57", "#f07815", "#8fd883", "#060e27", "#96e591", "#21d52e", "#d00043",
                "#b47162", "#1ec227", "#4f0f6f", "#1d1d58", "#947002", "#bde052", "#e08c56",
                "#28fcfd", "#bb09b", "#36486a", "#d02e29", "#1ae6db", "#3e464c", "#a84a8f",
                "#911e7e", "#3f16d9", "#0f525f", "#ac7c0a", "#b4c086", "#c9d730", "#30cc49",
                "#3d6751", "#fb4c03", "#640fc1", "#62c03e", "#d3493a", "#88aa0b", "#406df9",
                "#615af0", "#4be47", "#2a3434", "#4a543f", "#79bca0", "#a8b8d4", "#00efd4",
                "#7ad236", "#7260d8", "#1deaa7", "#06f43a", "#823c59", "#e3d94c", "#dc1c06",
                "#f53b2a", "#b46238", "#2dfff6", "#a82b89", "#1a8011", "#436a9f", "#1a806a",
                "#4cf09d", "#c188a2", "#67eb4b", "#b308d3", "#fc7e41", "#af3101", "#ff065",
                "#71b1f4", "#a2f8a5", "#e23dd0", "#d3486d", "#00f7f9", "#474893", "#3cec35",
                "#1c65cb", "#5d1d0c", "#2d7d2a", "#ff3420", "#5cdd87", "#a259a4", "#e4ac44",
                "#1bede6", "#8798a4", "#d7790f", "#b2c24f", "#de73c2", "#d70a9c", "#25b67",
                "#88e9b8", "#c2b0e2", "#86e98f", "#ae90e2", "#1a806b", "#436a9e", "#0ec0ff",
                "#f812b3", "#b17fc9", "#8d6c2f", "#d3277a", "#2ca1ae", "#9685eb", "#8a96c6",
                "#dba2e6", "#76fc1b", "#608fa4", "#20f6ba", "#07d7f6", "#dce77a", "#77ecca"];
var rand = back[Math.floor(Math.random() * back.length)];
