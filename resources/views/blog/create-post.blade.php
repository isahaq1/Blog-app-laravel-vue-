@include('admin.header')
@include('admin.sidebar')
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 col-sm-12 col-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              
        <form action="{{url('save-post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif

                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="card-title"> Blog Post </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label> Name <i class="text-danger">*</i></label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Name" required>
                            </div>
                            <div class="form-group">
                                <label> Slug </label>
                                <textarea class="form-control" id="description" placeholder="Enter the Slug" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label> Blog Banner </label>
                                <!-- <textarea class="form-control" id="blog_banner" placeholder="Enter the Blog banner" name="blog_banner"></textarea> -->
                                <input type="file" name="blog_banner" id="blog_banner" />
                            </div>

                            

                            <div class="form-group">
                                <label> Blog Body </label>
                                <textarea class="form-control" id="blog_body" placeholder="Enter the Blog Body" name="blog_body"></textarea>
                            </div>

                             <div class="form-group">
                                <label> Category </label>
                                <input type="text" class="form-control" id="category" placeholder="Enter the Category" name="category">
                            </div>

                             <div class="form-group">
                                <label> Tag </label>
                                <input type="text" class="form-control" id="tag" placeholder="Enter the Tag" name="tag">
                               
                            </div>

                        </div>

                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</section>
@include('admin.footer')
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">
     ClassicEditor
        .create( document.querySelector( '#description' ), {
            ckfinder: {
                uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}'
            }
        },{
            alignment: {
                options: [ 'right', 'right' ]
            }} )
        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        })
</script>
<script>
    //Define an adapter to upload the files
    class MyUploadAdapter {
       constructor(loader) {
          // The file loader instance to use during the upload. It sounds scary but do not
          // worry — the loader will be passed into the adapter later on in this guide.
          this.loader = loader;

          // URL where to send files.
          this.url = '{{ route('ckeditor.upload') }}';

          //
       }
       // Starts the upload process.
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       // Aborts the upload process.
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       // Initializes the XMLHttpRequest object using the URL passed to the constructor.
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          // Note that your request may look different. It is up to you and your editor
          // integration to choose the right communication channel. This example uses
          // a POST request with JSON as a data structure but your configuration
          // could be different.
          // xhr.open('POST', this.url, true);
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       // Initializes XMLHttpRequest listeners.
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             // This example assumes the XHR server's "response" object will come with
             // an "error" which has its own "message" that can be passed to reject()
             // in the upload promise.
             //
             // Your integration may handle upload errors in a different way so make sure
             // it is done properly. The reject() function must be called when the upload fails.
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }
             // If the upload is successful, resolve the upload promise with an object containing
             // at least the "default" URL, pointing to the image on the server.
             // This URL will be used to display the image in the content. Learn more in the
             // UploadAdapter#upload documentation.
             resolve({
                default: response.url,
             });
          });
          // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
          // properties which are used e.g. to display the upload progress bar in the editor
          // user interface.
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       // Prepares the data and sends the request.
       _sendRequest(file) {
          // Prepare the form data.
          const data = new FormData();
          data.append("upload", file);
          // Important note: This is the right place to implement security mechanisms
          // like authentication and CSRF protection. For instance, you can use
          // XMLHttpRequest.setRequestHeader() to set the request headers containing
          // the CSRF token generated earlier by your application.
          // Send the request.
          this.xhr.send(data);
       }
       // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          // Configure the URL to the upload script in your back-end here!
          return new MyUploadAdapter(loader);
       };
    }

  

</script>
  </body>
</html>