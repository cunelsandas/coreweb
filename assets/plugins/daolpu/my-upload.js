let MyUpload = {
    data: function () {
        return {
            files: Array,
            images: Array,
        }
    },
    props: {
        previewSize: String,
        multiFile: Boolean,
        quality: Number,
        imgWidth: Number,
        fieldShow: Number
    },
    template:
        '<div class="my-upload">' +
        '   <div class="row">' +
        '       <div :class="\'col-\'+ Math.ceil(12/fieldShow)+\' mb-2 file-show\'" :style="\'min-height: \'+previewSize" v-for="val,key in images">' +
        '       <div class="card border-0 shadow-none text-center">' +
        '           <img :src="val.url" class="card-img">' +
        '           <i v-if="val.type == \'doc\' || val.type == \'docx\'" class="fas fa-10x fa-file-word text-primary"></i>' +
        '           <i v-if="val.type == \'xls\' || val.type == \'xlsx\'" class="fas fa-10x fa-file-excel text-success"></i>' +
        '           <i v-if="val.type == \'pdf\'" class="fas fa-10x fa-file-pdf text-danger"></i>' +
        '           <div class="card-img-overlay">' +
        '               <p class="card-text"><h4>{{val.name}}</h4></p>' +
        '               <input v-if="val.value" type="text" name="images[]" :value="val.value" hidden>' +
        '           </div>' +
        '       </div>' +
        '       </div>' +
        '   </div>' +
        '   <input type="file" class="form-control" name="files[]"  id="inputFile" :multiple="multiFile" @change="FileOnChange($event)">' +
        '</div>',
    methods: {
        FileOnChange: function (e) {
            let data = [], maxWidth = this.imgWidth, quality = this.quality, self = this;
            $.each(e.target.files, function (k, v) {
                var fileName = v.name, ext = v.name.split('.'), _type = ext[ext.length - 1].toLowerCase();
                if (_type == 'jpeg' || _type == 'jpg' || _type == 'png') {
                    self.resizeImage(v, maxWidth, quality, (url) => {
                        data.push({'value': url + ',' + fileName, 'url': url, 'name': fileName, 'type': _type});
                    });
                } else if (_type == 'gif') {
                    var url = URL.createObjectURL(v);
                    data.push({'value': false, 'url': url, 'name': fileName, 'type': _type});
                } else {
                    data.push({'value': false, 'url': url, 'name': fileName, 'type': _type});
                }
            });
            this.images = data;
        },
        resizeImage: function (file, maxWidth, imgQuality, callback) {
            var img = new Image();
            img.src = URL.createObjectURL(file);
            img.onload = function () {
                var canvas = document.createElement('canvas'), ctx = canvas.getContext('2d'),
                    cw = canvas.width, ch = canvas.height, iw = img.width, ih = img.height,
                    scale = Math.min((maxWidth / iw)),
                    iwScaled = iw * scale, ihScaled = ih * scale;
                canvas.width = iwScaled;
                canvas.height = ihScaled;
                ctx.drawImage(img, 0, 0, iwScaled, ihScaled);
                callback(canvas.toDataURL(file.type, imgQuality));
            };
        }, resetFileUpload: function () {
            $('.file-show').remove();
            $('#inputFile').val('');
        }
    },
};

var processTimmer = function (text = 'ระบบกำลังประมวลผล') {
    Swal.fire({
        title: text,
        timer: 50000,
        showConfirmButton: false,
        timerProgressBar: true,
    });
}
var processSuccess = function (text = 'สำเร็จ') {
    Swal.fire({
        icon: 'success',
        title: text,
        showConfirmButton: true,
        confirmButtonColor: '#00d610',
    });
}
var processError = function (text = 'พบข้อผิดพลาด') {
    Swal.fire({
        icon: 'error',
        title: text,
        showConfirmButton: true,
    })
}
var processConfrim = function (callback, text = 'ต้องการลบข้อมูลนี้หรือไม่') {
    Swal.fire({
        title: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ต้องการลบข้อมูลนี้',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            callback();
        }
    });
}

class GetDataRequest {
    _post(url, data, successCallback, errorCallback) {
        axios.post(url, data).then((response) => {
            successCallback(response)
        }).catch((err) => {
            errorCallback(err)
        });
    }

    _put(url, data, successCallback, errorCallback) {
        data.append('_method', 'put');
        axios.post(url, data).then((response) => {
            successCallback(response)
        }).catch((err) => {
            errorCallback(err)
        });
    }

    _delete(url, data, successCallback, errorCallback) {
        data.append('_method', 'delete');
        axios.post(url, data).then((response) => {
            successCallback(response)
        }).catch((err) => {
            errorCallback(err)
        });
    }

    _get(url, data, successCallback, errorCallback) {
        axios.get(url).then((response) => {
            successCallback(response)
        }).catch((err) => {
            errorCallback(err)
        });
    }
}
