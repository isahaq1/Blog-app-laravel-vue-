@include('admin.header')
@include('admin.sidebar')
        
        <div class="row" style="padding:20px;margin-left: 50px;">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Blog Form</h3>
              </div>
<div class="card-body"> 
    <div class="col-xl-8 col-lg-8 col-sm-8 col-8 m-auto">
        @if(count($posts) > 0)
          <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th style="width:30%;"> Title </th>
                        <th> Decription </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post) 
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> {{ $post->name }} </td>
                            <td> {!! html_entity_decode($post->slug) !!} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          {{ $posts->links() }}
        @endif
    </div>
    </div>
      </div> 
      </div>
      </div>
        
@include('admin.footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>