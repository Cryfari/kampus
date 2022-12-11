<x-app-layout>

    <script src="https://cdn.tiny.cloud/1/793dnkp8qwensglg1zwxv9s0mt21syl4zjp64p8v5v8xsg7z/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Berita
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST"
                        action="{{ isset($data) ? route('edit_berita_process', [$data->id_berita, $data->image]) : route('tambah_berita_process') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('put')
                        @endif
                        <div class="mb-3">
                            <x-input-label for="Judul" value="Judul" />
                            <x-text-input id="Judul" class="block mt-1 w-full" type="text" name="judul"
                                required value="{{ isset($data) ? $data->judul : '' }}" autofocus />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="image" value="Gambar" />
                            <input name="image" type="file" name="image" data-sb-validations="required"
                                accept="image/*" {{ isset($data) ? '' : 'required' }} />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="Headline" value="Headline" />
                            <x-text-input id="headline" class="block mt-1 w-full" type="text" name="headline"
                                required value="{{ isset($data) ? $data->headline : '' }}" autofocus />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="isi" value="isi" name="isi" />
                            <textarea class="form-control" id="isi" name="isi"></textarea>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="pengirim" value="pengirim" />
                            <x-text-input id="pengirim" class="block mt-1 w-full" type="text" name="pengirim"
                                required value="{{ isset($data) ? $data->pengirim : '' }}" autofocus />
                        </div>
                        @if (isset($data))
                            <script></script>
                        @endif


                        <center>
                            <x-primary-button class="my-4">
                                Submit
                            </x-primary-button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 75%">
        <div>
            <div class="w-full sm: px-6 bg-white shadow-md overflow-hidden sm:rounded-lg">

            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect lists advlist',
            file_picker_types: 'image',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,

            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            init_instance_callback: "insert_contents",
        });

        setTimeout(function() {

            var ContentSet = tinymce.activeEditor.setContent({{ isset($data) ? Js::from($data->isi) : '' }});

        }, 3000);
    </script>

</x-app-layout>
