<script>
    let app = '#app', getData = new GetDataRequest(), moduleModal = 'module-modal', moduleManage = 'module-manage',
        subModal = 'sub-modal';
    Vue.component(moduleManage, {
        props: {
            data: Array,
            edit: Function,
            viewModule: Function,
            remove: Function
        },
        template: '#' + moduleManage
    });
    Vue.component(moduleModal, {
        props: {
            data: Array,
            title: String,
            menu: Array,
            save: Function,
            checkEmpty: Function
        },
        template: '#' + moduleModal
    })
    ;
    Vue.component(subModal, {
        props: {
            data: Array,
            table: Array,
            folder: Array,
            title: String,
            save: Function,
        },
        template: '#' + subModal
    });
    const appManage = new Vue({
        el: app,
        data: {
            allData: {},
            modal: {
                data: [],
                table: [],
                folder: [],
                menu: [],
                title: ''
            },
            data: {}
        },
        beforeUpdate() {
            let input = $('input.form-control');
            input.each((k, v) => {
                $(v).val('');
            })
        },
        created: function () {
            this.getData()
        },
        methods: {
            setUrl: function (e, type) {
                let ptc = window.location.protocol, root = window.location.hostname, href = ptc + '//' + root + '/';
                let url = type === 0 ? href + e : e;
                $('#test-link').attr('href', url)
            },
            setDisabled: function (target, targetAction, type) {
                let is = true;
                $(target).attr('disabled', !is);
                $(target).attr('hidden', !is);
                $(targetAction).attr('disabled', is);
                $(targetAction).attr('hidden', is);
            },

            getData: function (page) {
                let url = $(app).data('url'), data = new FormData(), _page = isNaN(page) ? 1 : page;
                getData._post(url, data, (response) => {
                    this.allData = response.data.data;
                }, (error) => {
                    processError()
                })
            },
            viewData: function (id, type = '') {
                let url = $(app).data('url'), data = new FormData(), _id = isNaN(id) ? '' : id,
                    modalTarget = !type ? '#' + moduleModal : '#' + subModal;
                data.append('id', _id);
                data.append('type', type);
                getData._post(url, data, (response) => {
                    this.modal.data = response.data.data;
                    if (type) {
                        this.modal.table = response.data.table;
                        this.modal.folder = response.data.folder;
                        this.modal.menu = response.data.menu;
                    }
                    $(modalTarget).modal({backdrop: 'static', keyboard: false});
                }, (error) => {
                    processError()
                })
            },
            checkEmpty: function (e, type) {
                let name = e.target.value, target = e.target, url = $(app).data('url-check-empty'),
                    data = new FormData();
                data.append('name', name);
                data.append('type', type);
                getData._post(url, data, (response) => {
                    let borderColor = response.data ? '#28a745' : '#dc3545';
                    $(target).css('border-color', borderColor);
                    $('#submit').attr('disabled', !response.data)
                }, (error) => {
                    processError()
                })
            },
            saveData: function (id, e, route = '') {
                let url = $(app).data('url'), data = new FormData(e.target), _id = isNaN(id) ? '' : id,
                    modalTarget = !route ? '#' + moduleModal : '#' + subModal;
                data.append('id', _id);
                data.append('route', route);
                getData._put(url, data, (response) => {
                    console.log(response);
                    this.getData();
                    processSuccess();
                    $(modalTarget).modal('hide');
                }, (error) => {
                    processError();
                    $(modalTarget).modal('hide');
                });
            },
            deleteData: function (id, route) {
                let url = $(app).data('url'), data = new FormData(), _id = isNaN(id) ? '' : id;
                data.append('id', _id);
                data.append('route', route);
                processConfrim(() => {
                    getData._delete(url, data, (response) => {
                        this.getData();
                        processSuccess();
                    }, (error) => {
                        processError();
                    });
                });
            }
        }
    });
</script>
