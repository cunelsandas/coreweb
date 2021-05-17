@extends('backend.layouts.app')
@section('content')
    <div id="test">
        <input type="text" class="form-control" @keyup="get(mgs)" v-model="mgs">
        <pagination :page-count="totalPage" :click-handler="get"
                    :container-class="'pagination pagination-sm justify-content-start'"
                    :prev-text="'<'" :next-text="'>'" :page-class="'page-item'"
                    :page-link-class="'page-link'" :prev-class="'page-item'"
                    :prev-link-class="'page-link'" :next-class="'page-item'"
                    :next-link-class="'page-link'" :first-last-button="true"
                    :first-button-text="'<<'" :last-button-text="'>>'"></pagination>
        <my-checkbox :fn="get" :page-s="totalPage"></my-checkbox>
    </div>
    <script>
        Vue.component('pagination', VuejsPaginate);
        Vue.component('my-checkbox', {
            props: {
                fn: Function,
                pageS: String
            },
            template: '<input type="text" class="form-control" @keyup="fn(5)" :value="pageS">'
        });
        let App = new Vue({
            el: '#test',
            created: function () {
                this.mgs = 555;
            },
            data: {
                mgs: '666',
                totalPage: 10
            },
            methods: {
                get: (page) => {
                    alert(page);
                }
            }
        })
    </script>
@endsection
