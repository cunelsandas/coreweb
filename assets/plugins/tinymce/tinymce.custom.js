const content_css = $('#tiny-mce-asset').data('css'), upload_tiny = $('#tiny-mce-asset').data('upload');
tinymce.init({
    selector: 'textarea.textarea-detail',
    height: '500px',
    // menubar: false,
    menubar: 'file edit view insert format tools table help',  //add เพิ่มนะจ๊ะ
    language: 'th_TH',
    plugins: [
        'print preview searchreplace autolink directionality ',
        'pageembed code preview',
        'visualblocks visualchars fullscreen image link media template ',
        'codesample table charmap hr pagebreak nonbreaking anchor toc ',
        'insertdatetime advlist lists textpattern'],
    toolbar1: 'fontselect | undo redo removeformat |  formatselect | fontsizeselect | bold underline italic |pageembed code preview ',
    toolbar2: 'alignleft aligncenter alignright alignjustify | forecolor backcolor | table | bullist numlist outdent indent | image media link | fullscreen',
    tiny_pageembed_classes: [
        { text: 'Big embed', value: 'my-big-class' },
        { text: 'Small embed', value: 'my-small-class' }
    ],
    font_formats:
        "TH SarabunPSK=TH SarabunPSK,sans-serif;" +
        "TH Chakra Petch=TH Chakra Petch,sans-serif;" +
        "TH Kodchasal=TH Kodchasal,sans-serif;" +
        "TH SarabunIT=TH SarabunIT,sans-serif;" +
        "TH NiramitIT=TH NiramitIT,sans-serif;" +
        "TH Baijam=TH Baijam,sans-serif;" +
        "TH KoHo=TH KoHo,sans-serif;" +
        "TH Srisakdi=TH Srisakdi,sans-serif;" +
        "TH Fah kwang=TH Fah kwang,sans-serif;" +
        "TH K2D July8=TH K2D July8,sans-serif;" +
        "TH Niramit AS=TH Niramit AS,sans-serif;" +
        "TH Kodchasal=TH Kodchasal,sans-serif;" +
        "TH Mali Grade 6=TH Mali Grade 6,sans-serif;" +
        "TH Krub=TH Krub,sans-serif;" +
        "Arial=arial,helvetica,sans-serif;" +
        "Courier New=courier new,courier,monospace;" +
        "AkrutiKndPadmini=Akpdmi-n",
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 52pt',
    automatic_uploads: false,
    images_upload_credentials: true,
    images_upload_handler: function (blobInfo, success, failure) {
        tiny_upload_image(blobInfo.blob(), (res) => {
            success(res);
        });
    },
    content_css: content_css,
});

let tiny_upload_image = function (blob, callback) {
    let reader = new FileReader();
    reader.onload = function () {
        let dataUrl = reader.result, formData = new FormData(), url = upload_tiny;
        formData.append('file', dataUrl);
        formData.append('name', blob.name);
        axios.post(url, formData).then((res) => {
            callback(res.data.location)
        }).catch(() => {
        })
    };
    reader.readAsDataURL(blob);
};
