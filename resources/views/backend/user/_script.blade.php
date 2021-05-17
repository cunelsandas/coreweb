<script>
    let app = '#app', getData = new GetDataRequest(), userManage = 'user-manage', modalUser = 'modal-user',
        modal = '#modal-view', permissionModal = '#permission-modal', permissionManage = 'permission-manage';
    Vue.component('pagination', VuejsPaginate);
    Vue.component(userManage, {
        props: {
            data: Array,
            edit: Function,
            remove: Function,
            permission: Function,
        },
        template: '#' + userManage
    });
    Vue.component(modalUser, {
        props: {
            data: Array,
            module: Array,
            title: String,
            save: Function
        },
        template: '#' + modalUser,
    });

    Vue.component(permissionManage, {
        props: {
            data: Array,
            save: Function
        },
        template: '#' + permissionManage
    });
    const appManage = new Vue({
        el: app,
        data: {
            totalPage: 1,
            page: 1,
            search: '',
            allData: {},
            modal: {
                title: '',
                data: [],
                module: []
            },
            permission: []
        },
        beforeUpdate() {
            $('.custom-control-input').each((k, v) => {
                $(v).prop('checked', false);
            });
        },
        created: function () {
            this.getData(1)
        },
        methods: {
            getData: function (page) {
                this.page = page;
                let url = $(app).data('url'), data = new FormData(), _page = isNaN(page) ? 1 : page;
                data.append('page', _page);
                data.append('search', this.search);
                getData._post(url, data, (response) => {
                    this.allData = response.data.data;
                    this.totalPage = response.data.pages;
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
                    this.modal.module = response.data.modules;
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
            },
            permissionView: function (id) {
                let url = $(app).data('permission'), data = new FormData();
                data.append('id', id);
                getData._post(url, data, (response) => {
                    this.permission = response.data;
                    this.$nextTick(() => {
                        $(permissionModal).modal({backdrop: 'static', keyboard: false});
                    })
                });
            },
            permissionSave: function (id, e) {
                let url = $(app).data('permission'), data = new FormData(e.target);
                data.append('id', id);
                getData._put(url, data, (response) => {
                    processSuccess();
                    $(permissionModal).modal('hide');
                }, (error) => {
                    processError();
                });
            }
        }
    });
</script>
