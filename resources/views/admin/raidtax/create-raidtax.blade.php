<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row ">
        <div class="col-10">
          <h1 class="text-center mb-4">Add Raid Tactics - Admin Panel</h1>

          <hr>
          {{-- Add Raid Tactics Form --}}
          <form class="mb-3" action="{{ route('raidtax.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
              {{-- Category Selection Input --}}
              <div class="col-6 mb-4">
                <label class="form-label" for="raid_tax_category">Select a Raid Instance: <i class="fa-light fa-asterisk text-danger"></i></label>
                <select class="form-control {{$errors->has('raid_tax_category') ? 'is-invalid' : ''}}" name="raid_tax_category">
                  <option value="">Please select a Raid Instance</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ intval(old('raid_tax_category')) === $category->id  ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
                {{-- Displaying the error if exists   --}}
                <div>
                  @error('raid_tax_category')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                {{-- End of Displaying the error if exists   --}}
              </div>
              {{-- End Of Category Selection Input --}}

            </div>


            {{-- Boss Name input field --}}
            <div class="mb-2">
              <label class="form-label" for="boss_name">Boss Name: <i class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{ $errors->has('boss_name') ? 'is-invalid' : '' }}" type="text" name="boss_name" value="{{ old('boss_name') }}">

              {{-- Displaying the errror if exists --}}
              <div>
                @error('boss_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the errror if exists --}}
            </div>
            {{-- End Of Boss Name input field --}}

            
            {{-- Phase 1 fields --}}
            <div id="phase-1" class="mb-4">
              <hr>
              <h4>Phase 1</h4>
              <hr>
              
              <!-- Phase 1 Title input field  -->
              <div class="mb-2">
                <label class="form-label" for="title_1">Title <i class="fa-light fa-asterisk text-danger"></i></label>
                <input class="form-control {{$errors->has('title_1') ? 'is-invalid' : ''}}" type="text" name="title_1" value="{{ old('title_1')}}">
                
                <!-- Displaying the error if exists -->  
                <div>
                  @error('title_1')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <!-- ./Displaying the error if exists -->  
              </div>
              <!-- ./Phase 1 Title input field -->

              {{-- Phase 1 body input field --}}
              <div class="mb-2 ">
                <label for="body_1">Raid Tactics body <i class="fa-light fa-asterisk text-danger"></i></label>
                <textarea class="form-control " name="body_1" rows="5" id="body_1">{{ old('body_1') }}</textarea>

                {{-- Displaying the error if exists --}}
                <div>
                  @error('body_1')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error if exists --}}
              </div>
              {{-- End Of Phase 1 body input field --}}

              {{-- Phase 1 mythic input field --}}
              <div class="mb-2 ">
                <label for="mythic_1">Raid Tactics Mythic options: </label>
                <textarea class="form-control " name="mythic_1" rows="5" id="mythic_1">{{ old('mythic_1') }}</textarea>

                {{-- Displaying the error if exists --}}
                <div>
                  @error('mythic_1')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error if exists --}}
              </div>
              {{-- End Of Phase 1 mythic input field --}}


              {{-- File path for image --}}
              <div class="mb-2">
                <label class="form-label" for="file_path_1">Image: <span >(optional)</span></label>
                <input class="form-control-file {{ $errors->has('file_path_1') ? 'is-invalid' : '' }}" type="file" name="file_path_1" value="{{ old('file_path_1')}}">

                {{-- Displaying the error of exists --}}
                <div>
                  @error('file_path_1')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error of exists --}}

              </div>
              {{-- End Of File path for image --}}
            </div>
            {{-- End Of Phase 1 fields --}}

            {{-- Phase 2 fields --}}
            <div id="phase-2" class="mb-4">
              <hr>
              <h4>Phase 2</h4>
              <hr>
              
              <!-- Phase 1 Title input field  -->
              <div class="mb-2">
                <label class="form-label" for="title_2">Title (optional)</label>
                <input class="form-control {{ $errors->has('title_2') ? 'is-invalid' : ''}}" type="text" name="title_2" value="{{ old('title_2')}}">
                
                <!-- Displaying the error if exists -->  
                <div>
                  @error('title_2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <!-- ./Displaying the error if exists -->  
              </div>
              <!-- ./Phase 1 Title input field -->

              {{-- Phase 1 body input field --}}
              <div class="mb-2">
                <label for="body_2">Raid Tactics body (optional)</label>
                <textarea class="form-control {{ $errors->has('body_2') ? 'is-invalid' : '' }}" name="body_2" rows="5" id="body_2">{!! old('body_2') !!}</textarea>

                {{-- Displaying the error if exists --}}
                <div>
                  @error('body_2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error if exists --}}
              </div>
              {{-- End Of Phase 1 body input field --}}

              {{-- Phase 2 mythic input field --}}
              <div class="mb-2 ">
                <label for="mythic_2">Raid Tactics Mythic options: </label>
                <textarea class="form-control " name="mythic_2" rows="5" id="mythic_2">{{ old('mythic_2') }}</textarea>

                {{-- Displaying the error if exists --}}
                <div>
                  @error('mythic_2')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error if exists --}}
              </div>
              {{-- End Of Phase 2 mythic input field --}}

              {{-- File path for image --}}
              <div class="mb-2">
                <label class="form-label" for="file_path_2">Image: <span >(optional)</span></label>
                <input class="form-control-file {{ $errors->has('file_path_2') ? 'is-invalid' : '' }}" type="file" name="file_path_2" value="{{ old('file_path_2')}}">

                {{-- Displaying the error of exists --}}
                <div>
                  @error('file_path_2')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                {{-- End Of Displaying the error of exists --}}

              </div>
              {{-- End Of File path for image --}}
            </div>
            {{-- End Of Phase 2 fields --}}

            {{-- Button for add phase 3 --}}
            <div id='btn-p3-wrap'>
              <span onclick="addPhase_3()" role="button" class="btn btn-primary" id='btn-p3'>Add Phase 3</span>
            </div>
            {{-- Button for add phase 3 --}}

            {{-- Phase 3 fields --}}
            <div id="phase-3" class="mb-4">
              
            </div>
            {{-- End Of Phase 3 fields --}}

            {{-- Button for add phase 3 --}}
            <div id='btn-p4-wrap'>
              <span onclick="addPhase_4()" role="button" class="btn btn-primary" id='btn-p4'>Add Phase 4</span>
            </div>
            {{-- Button for add phase 3 --}}

            {{-- Phase 4 fields --}}
            <div id="phase-4" class="mb-4">
              
            </div>
            {{-- End Of Phase 4 fields --}}


            {{-- Button for add phase 5 --}}
            <div id='btn-p5-wrap'>
              <span onclick="addPhase_5()" role="button" class="btn btn-primary" id='btn-p5'>Add Phase 5</span>
            </div>
            {{-- Button for add phase 5 --}}

            {{-- Phase 5 fields --}}
            <div id="phase-5" class="mb-4">
              
            </div>
            {{-- End Of Phase 5 fields --}}


            <div class="d-flex">
              <div class="mx-auto">
                <a href="{{ route('raidtaxcat.index') }}" class="btn btn-outline-danger">Cancel</a>
                <input type="submit" value="Add Raid Tactic" class="btn btn-success">
              </div>
            </div>

          </form>
          {{-- End Of Add Raid Tactics Form --}}
          
        </div>
      </div>
    </div>
  @endsection

  @section('extra-script')  
  
  <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

  <script>
    let elementsList = document.querySelectorAll("#body_1, #mythic_1, #body_2, #mythic_2");
    let elementsArray = [...elementsList];


    function addEditor(array) {
      array.forEach(element => {

      // This sample still does not showcase all CKEditor 5 features (!)
      // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
      CKEDITOR.ClassicEditor.create(element, {
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
      });
    }

    addEditor(elementsArray);

    function addPhase_3() {
      document.getElementById('phase-3').innerHTML += 
      `
      <hr>
      <h4>Phase 3</h4>
      <hr>
      
      <!-- Phase 3 Title input field  -->
      <div class="mb-2">
        <label class="form-label" for="title_3">Title (optional)</label>
        <input class="form-control {{$errors->has('title_3') ? 'is-invalid' : ''}}" type="text" name="title_3" value="{{ old('title_3')}}">
        
        <!-- Displaying the error if exists -->  
        <div>
          @error('title_3')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <!-- ./Displaying the error if exists -->  
      </div>
      <!-- ./Phase 3 Title input field -->

      {{-- Phase 3 body input field --}}
      <div class="mb-2">
        <label for="body_3">Raid Tactics body (optional)</label>
        <textarea class="form-control" name="body_3" rows="5" id="body_3">{{ old('body_3') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('body_3')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 3 body input field --}}

      {{-- Phase 3 mythic input field --}}
      <div class="mb-2 ">
        <label for="mythic_3">Raid Tactics Mythic options: </label>
        <textarea class="form-control " name="mythic_3" rows="5" id="mythic_3">{{ old('mythic_3') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('mythic_3')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 3 mythic input field --}}

      {{-- File path for image --}}
      <div class="mb-2">
        <label class="form-label" for="file_path_3">Image: <span >(optional)</span></label>
        <input class="form-control-file {{ $errors->has('file_path_3') ? 'is-invalid' : '' }}" type="file" name="file_path_3" value="{{ old('file_path_3')}}">

        {{-- Displaying the error of exists --}}
        <div>
          @error('file_path_3')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error of exists --}}

      </div>
      {{-- End Of File path for image --}}
      `;
      
      document.getElementById('btn-p3-wrap').remove();

      let elementsList = document.querySelectorAll("#body_3, #mythic_3");
      let elementsArray = [...elementsList];
      addEditor(elementsArray);
    }

    function addPhase_4() {
      document.getElementById('phase-4').innerHTML += 
      `
      <hr>
      <h4>Phase 4</h4>
      <hr>
      
      <!-- Phase 4 Title input field  -->
      <div class="mb-2">
        <label class="form-label" for="title_4">Title (optional)</label>
        <input class="form-control {{$errors->has('title_4') ? 'is-invalid' : ''}}" type="text" name="title_4" value="{{ old('title_4')}}">
        
        <!-- Displaying the error if exists -->  
        <div>
          @error('title_4')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <!-- ./Displaying the error if exists -->  
      </div>
      <!-- ./Phase 4 Title input field -->

      {{-- Phase 4 body input field --}}
      <div class="mb-2">
        <label for="body_4">Raid Tactics body (optional)</label>
        <textarea class="form-control" name="body_4" rows="5" id="body_4">{{ old('body_4') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('body_4')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 4 body input field --}}

      {{-- Phase 4 mythic input field --}}
      <div class="mb-2 ">
        <label for="mythic_4">Raid Tactics Mythic options: </label>
        <textarea class="form-control " name="mythic_4" rows="5" id="mythic_4">{{ old('mythic_4') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('mythic_4')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 4 mythic input field --}}

      {{-- File path for image --}}
      <div class="mb-2">
        <label class="form-label" for="file_path_4">Image: <span >(optional)</span></label>
        <input class="form-control-file {{ $errors->has('file_path_4') ? 'is-invalid' : '' }}" type="file" name="file_path_4" value="{{ old('file_path_4')}}">

        {{-- Displaying the error of exists --}}
        <div>
          @error('file_path_4')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error of exists --}}

      </div>
      {{-- End Of File path for image --}}
      `
      document.getElementById('btn-p4-wrap').remove();

      let elementsList = document.querySelectorAll("#body_4, #mythic_4");
      let elementsArray = [...elementsList];
      addEditor(elementsArray);
    }

    function addPhase_5() {
      document.getElementById('phase-5').innerHTML += 
      `
      <hr>
      <h4>Phase 5</h4>
      <hr>
      
      <!-- Phase 5 Title input field  -->
      <div class="mb-2">
        <label class="form-label" for="title_5">Title (optional)</label>
        <input class="form-control {{$errors->has('title_5') ? 'is-invalid' : ''}}" type="text" name="title_5" value="{{ old('title_5')}}">
        
        <!-- Displaying the error if exists -->  
        <div>
          @error('title_5')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <!-- ./Displaying the error if exists -->  
      </div>
      <!-- ./Phase 5 Title input field -->

      {{-- Phase 5 body input field --}}
      <div class="mb-2">
        <label for="body_5">Raid Tactics body (optional)</label>
        <textarea class="form-control" name="body_5" rows="5" id="body_5">{{ old('body_5') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('body_5')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 5 body input field --}}

      {{-- Phase 5 mythic input field --}}
      <div class="mb-2 ">
        <label for="mythic_5">Raid Tactics Mythic options: </label>
        <textarea class="form-control " name="mythic_5" rows="5" id="mythic_5">{{ old('mythic_5') }}</textarea>

        {{-- Displaying the error if exists --}}
        <div>
          @error('mythic_5')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error if exists --}}
      </div>
      {{-- End Of Phase 5 mythic input field --}}

      {{-- File path for image --}}
      <div class="mb-2">
        <label class="form-label" for="file_path_5">Image: <span >(optional)</span></label>
        <input class="form-control-file {{ $errors->has('file_path_5') ? 'is-invalid' : '' }}" type="file" name="file_path_5" value="{{ old('file_path_5')}}">

        {{-- Displaying the error of exists --}}
        <div>
          @error('file_path_5')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- End Of Displaying the error of exists --}}

      </div>
      {{-- End Of File path for image --}}
      `
      document.getElementById('btn-p5-wrap').remove();

      let elementsList = document.querySelectorAll("#body_5, #mythic_5");
      let elementsArray = [...elementsList];
      addEditor(elementsArray);
    }

  </script>
  @endsection
</x-admin-master>