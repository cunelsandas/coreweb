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
                    tinyMCE.activeEditor.setContent(res.data.data.detail);
                    $(modal).modal({backdrop: 'static', keyboard: false});
                }).catch(() => {
                    $(modal).modal('hide');
                    processError();
                });
            },
            saveData: function (id = '', e) {
                let data = new FormData(e.target), url = $(App).data('site');
                data.append('id', id);
                data.append('detail', tinyMCE.activeEditor.getContent());
                data.append('_method', 'put');
                processTimmer();
                axios.post(url, data).then((res) => {
                    $(modal).modal('hide');
                    processSuccess();
                    this.getData(this.showPage);
                }).catch(() => {
                    $(modal).modal('hide');
                    processError('กรุณากรอกรายละเอียด');
                });
            },
            deleteData: function (id) {
                processConfrim(() => {
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
