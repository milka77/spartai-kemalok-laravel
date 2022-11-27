<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h1 class="text-center">Add News</h1>
          <hr>

          <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- News Title --}}
            <div class="mb-2">
              <label class="form-label" for="title">News title: <i class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ old('title')}}">
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of News Title --}}

            {{-- Select News Category --}}
            <div class="mb-2">
              <label for="category">Select News Category: <i class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                  <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                @endforeach
              </select>

              {{-- Displaying the error of exists --}}
              <div>
                @error('category')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of Select News Category --}}

            {{-- News Body --}}
            <div class="mb-2">
              <label class="form-label" for="body">News body:
                <i class="fa-light fa-asterisk text-danger"></i>
              </label>
              
              <textarea id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="10" name='body'></textarea>
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('body')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of News Body --}}


            {{-- File path for image --}}
            <div class="mb-2">
              <label class="form-label" for="file_path">Image: <span >(optional but recommended for Guild Progress 'kill shot' )</span></label>
              <input class="form-control-file {{ $errors->has('file_path') ? 'is-invalid' : '' }}" type="file" name="file_path" value="{{ old('file_path')}}">

              {{-- Displaying the error of exists --}}
              <div>
                @error('file_path')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}

            </div>
            {{-- End Of File path for image --}}

            {{-- Submit Button --}}
            <div class="mb-2">
              <div class="d-flex">
                <div class="mx-auto">
                  <a href="{{ route('news.index') }}" class="btn btn-outline-danger">Cancel</a>
                  <button class="btn btn-primary" type="submit">Add News</button>
                </div>
              </div>
            </div>
            {{-- End Of Submit Button --}}
          </form>
        </div>
      </div>
    </div>
  @endsection
  
  @section('extra-script')  
  <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

  <script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("body"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
              'findAndReplace', 'selectAll', '|',
              'bold', 'italic', 'strikethrough', 'underline', 'code', 'removeFormat', '|',
              'outdent', 'indent', '|',
              'undo', 'redo',
              '-',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
              'alignment', '|',
              'link', 'insertTable', '|',
              'specialCharacters', 'horizontalLine', 'pageBreak', '|',
              'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
  </script>

  @endsection
</x-admin-master>