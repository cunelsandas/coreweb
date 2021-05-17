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
                }).catch(() => {
                    window.location.reload();
                });
            },

        },
    });

</script>
