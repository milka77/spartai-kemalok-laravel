<x-admin-master>
  @section('content')
    <div class="container-fluid">
      <div class="row">
        {{-- Left Side --}}
        <div class="col-sm-12 col-lg-8">
          <h1 class="text-center">Hír szerkesztése</h1>
          <hr>

          <form action="{{ route('news.update', $news->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- News Title --}}
            <div class="mb-2">
              <label class="form-label" for="title">Hír címe: <i class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ $news->title }}">
              
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
              <label for="category">Válassz hír kategóriát: <i class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $news->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
              
              <textarea id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="12" name='body'>{{ $news->body }}</textarea>
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('body')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of News Body --}}


            {{-- Video Url input --}}
            <div class="mb-2">
              <label class="form-label" for="title">Video url: <small>(https://www.youtube.com/watch?v=WIufa2mLkso)</small></label>
              <input class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" type="url" name="video_url" value="{{ $news->video_url }}">
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('video_url')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End of Video Url input --}}


            {{-- File path for image --}}
            <div class="mb-2">
              <label class="form-label" for="file_path">Image: <span >(optional but recommended for Guild Progress 'kill shot' )</span></label>
              <input class="form-control-file {{ $errors->has('file_path') ? 'is-invalid' : '' }}" type="file" name="file_path" value="">

              {{-- Displaying the error of exists --}}
              <div>
                @error('file_path')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}

            </div>
            {{-- End Of File path for image --}}

            {{-- Current Image --}}
            @if (!empty($news->file_path))
            <div class="row">
              <div class="col-9 p-2">
                <span>Currnet Image:</span>
                <a href="{{ $news->file_path }}" target="_blank">
                  <img  class="img-fluid" src="{{ $news->file_path }}" alt="{{ $news->title }}">
                </a>
              </div>
            </div>
          @endif
          {{-- End Of Current Image --}}

            {{-- Submit Button --}}
            <div class="mb-2">
              <div class="d-flex">
                <div class="mx-auto">
                  <a href="{{ route('news.index') }}" class="btn btn-outline-danger">Cancel</a>
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </div>
            </div>
            {{-- End Of Submit Button --}}
          </form>
        </div>
        {{-- Left Side --}}


        {{-- Right side --}}
        <div class="col-sm-12 col-lg-4">
          <h1 class="text-center">Options, Hints</h1>
          <hr>
          <div>
            <h4>Video Linkelese:</h4>
            <h5>YouTube:</h5>
            <ul>
              <li>Egyszeruen a YouTube video linkjet bemasolni a Video Url-hez es kesz.</li>
            </ul>
            <h6>Szerkesztes:</h6>
            <ul>
              <li>Ha lecserelned a videot, kitorlod a regi linket es az uj YouTube video linkjet bemasolnod a Video Url-hez es kesz.</li>
            </ul>
            <h5>Mas Videok pl: (vimeo)</h5>
            <ul>
              <li>Linkelni kivant video alatt katt share</li>
              <li>Embed opcio kivalasztasa es Copy ami kimasolja a beillesztendo iframe codot</li>
              <li>Beirod a szoveget a hirhez es mielott a videot belinkelned atvaltod <>Source nezetbe az editort</li>
              <li>Most belehet illeszteni a video kimasolt iframe code-jat ahova szeretnenk</li>
              <li>Ahoz, hogy szepen kozepen legyen a video egy rovid class-t bekell illeszteni</li>
              <li><strong>class="mx-auto"</strong>  << ezt kell beilleszteni az iframe es a width koze lasd: <span class="px-1 bg-secondary text-white rounded">iframe class="mx-auto" width="560"</span></li>
              <li>Ha meg kell modositani a szovegen kikell kapcsolni a <>Source nezetet</li>
            </ul>
          </div>
        </div>
        {{-- End of Right side --}}
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