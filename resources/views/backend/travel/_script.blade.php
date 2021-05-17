<script>
    let App = '#app', tableDomains = 'table-manage', modalDomains = 'modal-manage', modal = '#modal-view';
    Vue.component('pagination', VuejsPaginate);
    Vue.component('file-upload', MyUpload);
    Vue.component(tableDomains, {
        props: {
            data: Array,
            edit: Function,
            remove: Function,
        },
        template: "#" + tableDomains,
    });
    Vue.component(modalDomains, {
        props: {
            data: Array,
            files: Array,
            title: String,
            saveData: Function,
            deleteFile: Function,
        },
        template: '#' + modalDomains,
    });
    let ManageDomains = new Vue({
        el: App,
        data: {
            data: [],
            statistics: [],
            mySearch: '',
            showPage: 1,
            totalPage: 1,
            modal: {
                data: [],
                files: [],
                title: '',
            },
        },
        created: function () {
            this.getData(1);
        },
        methods: {
            getData: function (page) {
                this.showPage = page;
                let data = new FormData(), url = $(App).data('site'), limit = $(App).data('limit');
                data.append('page', page);
                data.append('limit', limit);
                data.append('search', this.mySearch);
                axios.post(url, data).then((res) => {
                    this.data = res.data.data;
                    this.statistics = res.data.statistics;
                    this.totalPage = res.data.pages;
                }).catch(() => {
                    window.location.reload();
                });
            },
            viewData: function (id = '') {
                let data = new FormData(), url = $(App).data('site'), title = '';
                title = id === '' ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล';
                data.append('id', id);
                axios.post(url, data).then((res) => {
                    this.modal.data = res.data.data;
                    this.modal.files = res.data.files;
                    this.modal.title = title;
                    $(modal).modal({backdrop: 'static', keyboard: false});

                    lng = parseFloat(res.data.data.f_lng);
                    lat = parseFloat(res.data.data.f_lat);
                    var map = new google.maps.Map(document.getElementById('map2'), {
                        center: {lat, lng},
                        zoom: 15
                    });

                    var marker = new google.maps.Marker({
                        position: {lat, lng},
                        map: map,
                        draggable: true
                    });

                    google.maps.event.addListener(marker, 'dragend', function () {
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();

                        document.getElementById("f_lat").value = lat.toFixed(5);
                        document.getElementById("f_lng").value = lng.toFixed(5);

                    });

                    var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

                    google.maps.event.addListener(searchBox, 'places_changed', function () {
                        var places = searchBox.getPlaces();

                        var bounds = new google.maps.LatLngBounds();
                        var i, place;
                        for (i = 0; place = places[i]; i++) {
                            console.log(places);
                            bounds.extend(place.geometry.location);
                            marker.setPosition(place.geometry.location);
                            var item_lat = place.geometry.location.lat();
                            var item_lng = place.geometry.location.lng();
                        }

                        document.getElementById("f_lat").value = item_lat.toFixed(5);
                        document.getElementById("f_lng").value = item_lng.toFixed(5);

                        google.maps.event.addListener(marker, 'dragend', function () {
                            var lat = marker.getPosition().lat();
                            var lng = marker.getPosition().lng();

                            document.getElementById("f_lat").value = lat.toFixed(5);
                            document.getElementById("f_lng").value = lng.toFixed(5);
                        });

                        map.fitBounds(bounds);
                        map.setZoom(15);
                    });

                }).catch(() => {
                    $(modal).modal('hide');
                    processError();
                });
            },
            saveData: function (id = '', e) {
                let data = new FormData(e.target), url = $(App).data('site');
                data.append('id', id);
                data.append('_method', 'put');
                processTimmer();
                axios.post(url, data).then((res) => {
                    $(modal).modal('hide');
                    processSuccess();
                    this.getData(this.showPage);
                }).catch(() => {
                    $(modal).modal('hide');
                    processError();
                });
            },
            deleteData: function (id) {
                processConfrim(() =>{
                    let data = new FormData(), url = $(App).data('site');
                    data.append('id', id);
                    data.append('_method', 'delete');
                    processTimmer();
                    axios.post(url, data).then((res) => {
                        processSuccess();
                        this.getData(this.showPage);
                    }).catch(() => {
                        processError();
                    });
                })
            },
            deleteFile: function (id, e) {
                processConfrim(() => {
                    let url = $(App).data('unset'), data = new FormData();
                    data.append('id', id);
                    data.append('_method', 'delete');
                    processTimmer();
                    axios.post(url, data).then((res) => {
                        processSuccess();
                        e.target.closest('.show-file').remove()
                    }).catch(() => {
                        processError();
                    });
                })
            }
        },
    });
    $(modal).on('hidden.bs.modal', function (e) {
        MyUpload.methods.resetFileUpload();
    });
</script>
