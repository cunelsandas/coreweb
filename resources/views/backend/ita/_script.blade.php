<script>
    let app = '#app', getData = new GetDataRequest(), menuManage = 'menu-manage', modalMenu = 'modal-menu',
        modal = '#modal-view';
    Vue.component(menuManage, {
        props: {
            data: Array,
            edit: Function,
            remove: Function,
        },
        template: '#' + menuManage
    });
    Vue.component(modalMenu, {
        props: {
            data: Array,
            module: Array,
            menu: Array,
            title: String,
            save: Function
        },
        template: '#' + modalMenu,
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
            }
        }
    });

    let appManage = new Vue({
        el: app,
        data: {
            allData: {},
            modal: {
                title: '',
                data: [],
                module: [],
                menu: []
            }
        },
        beforeUpdate() {
            $('#target').prop('checked', false)
        },
        created: function () {
            this.getData(1)
        },
        methods: {
            getData: function (page) {
                let url = $(app).data('url'), data = new FormData(), _page = isNaN(page) ? 1 : page;
                getData._post(url, data, (response) => {
                    this.allData = response.data.data;
                }, (error) => {
                    console.log(error)
                })
            },
            viewData: function (id) {
                let url = $(app).data('url'), data = new FormData(), _id = isNaN(id) ? '' : id;
                data.append('id', _id);
                let title = _id === '' ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล';
                getData._post(url, data, (response) => {
                    this.modal.title = title;
                    this.modal.data = response.data.data;
                    this.modal.module = response.data.module;
                    this.modal.menu = response.data.menu;
                    $(modal).modal({backdrop: 'static', keyboard: false});
                }, (error) => {
                    console.log(error)
                })
            },
            saveData: function (id, e) {
                let url = $(app).data('url'), data = new FormData(e.target), _id = isNaN(id) ? '' : id;
                data.append('id', _id);
                getData._put(url, data, (response) => {
                    this.getData();
                    processSuccess();
                    $(modal).modal('hide');
                }, (error) => {
                    processError();
                    $(modal).modal('hide');
                });
            },
            deleteData: function (id) {
                let url = $(app).data('url'), data = new FormData(), _id = isNaN(id) ? '' : id;
                data.append('id', _id);
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
