<script>
    let App = '#app', tableDomains = 'table-manage', modalDomains = 'modal-manage', modal = '#modal-view';
    Vue.component('pagination', VuejsPaginate);

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
                    Vue.nextTick().then(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                }).catch(() => {
                    // window.location.reload();
                });
            },
            viewData: function (id = '') {
                $('[data-toggle="tooltip"]').tooltip('hide');
                let data = new FormData(), url = $(App).data('site'), title = '';
                title = id === '' ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล';
                data.append('id', id);
                axios.post(url, data).then((res) => {
                    this.modal.data = res.data.data;
                    this.modal.files = res.data.files;
                    this.modal.title = title;
                    $(modal).modal({backdrop: 'static', keyboard: false});
                    Vue.nextTick().then(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                }).catch(() => {
                    $(modal).modal('hide');
                    processError();
                });
            },

        },
    });
    $(modal).on('hidden.bs.modal', function (e) {
        MyUpload.methods.resetFileUpload();
    });
</script>
