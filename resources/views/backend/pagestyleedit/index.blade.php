<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/css2.css') }}" rel="stylesheet">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->

    @livewireStyles
</head>

<body>
<livewire:backend.pagestyleedit.index/>
</body>
@livewireScripts
<script>
    let rootmenu = document.querySelector('[drag-root]')

    rootmenu.querySelectorAll('[drag-item]').forEach(el => {

        el.addEventListener('dragenter', e => {
            e.target.style.backgroundColor = 'green';

            e.preventDefault()
        })

        el.addEventListener('dragleave', e => {
            e.target.style.backgroundColor = "";
        })

        el.addEventListener('dragover', e.preventDefault())



    })
</script>
</html>




