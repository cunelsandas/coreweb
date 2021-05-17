<script>
    let App = '#app-domains', tableDomains = 'table-domains', modalDomains = 'modal-domains', modal = '#modal-view',
        permissionManage = 'permission-manage', permissionModal = '#permission-modal',
        getRequest = new GetDataRequest();
    Vue.component('pagination', VuejsPaginate);
    Vue.component(tableDomains, {
        props: {
            data: Array,
            edit: Function,
            remove: Function,
            permission: Function,
        },
        template: '#' + tableDomains
    });
    Vue.component(modalDomains, {
        props: {
            data: Array,
            title: Array,
            saveData: Function,
        },
        template: '#' + modalDomains
    });
    Vue.component(permissionManage, {
        props: {
            data: Array,
            save: Function
        },
        template: '#' + permissionManage
    });
    const ManageDomains = new Vue({
        el: App,
        data: {
            data: [],
            mySearch: '',
            showPage: 1,
            totalPage: 1,
            modal: {
                data: [],
                title: '',
            },
            permission: {
                modules: [],
                domain: '',
            },
        },
        created() {
            this.getData(1);
        },
        beforeUpdate() {
            let myCheckbox = $('.custom-control-input');
            myCheckbox.each((key, value) => {
                $(value).prop('checked', false);
            });
        },
        methods: {
            getData: function (page) {
                this.showPage = page;
                let data = new FormData(), url = $(App).data('url');
                data.append('page', page);
                data.append('search', this.mySearch);
                axios.post(url, data).then((res) => {
                    this.data = res.data.data;
                    this.totalPage = res.data.pages;
                }).catch(() => {
                    window.location.reload();
                });
            },
            viewData: function (id) {
                let data = new FormData(), url = $(App).data('url'), title = '';
                title = isNaN(id) ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล';
                data.append('id', id);
                axios.post(url, data).then((res) => {
                    this.modal.data = res.data;
                    this.modal.title = title;
                    $(modal).modal({backdrop: 'static', keyboard: false});
                }).catch(() => {
                    processError();
                });
            },
            saveData: function (id = '', e) {
                $(modal).modal('hide');
                let data = new FormData(e.target), url = $(App).data('url');
                data.append('id', id);
                data.append('_method', 'put');
                processTimmer();
                axios.post(url, data).then((res) => {
                    processSuccess();
                    this.getData(this.showPage);
                }).catch(() => {
                    processError();
                });
            },
            deleteData: function (id) {
                processConfrim(() => {
                    let data = new FormData(), url = $(App).data('url');
                    data.append('id', id);
                    data.append('_method', 'delete');
                    axios.post(url, data).then((res) => {
                        processSuccess();
                        this.getData(this.showPage);
                    }).catch(() => {
                        processError();
                    });
                })
            },
            permissionView: function (id) {
                let url = $(App).data('permission'), data = new FormData();
                data.append('id', id);
                getRequest._post(url, data, (response) => {
                    this.permission = response.data;
                    this.$nextTick(() => {
                        $(permissionModal).modal({backdrop: 'static', keyboard: false});
                    })
                });
            },
            permissionSave: function (id, e) {
                let url = $(App).data('permission'), data = new FormData(e.target);
                data.append('id', id);
                getRequest._put(url, data, (response) => {
                    processSuccess();
                    $(permissionModal).modal('hide');
                }, (error) => {
                    processError();
                });
            }
        },
    });
</script>
