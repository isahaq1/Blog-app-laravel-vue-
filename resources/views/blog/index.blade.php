@include('admin.header')
@include('admin.sidebar')
          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Blog Form</h3>
              </div>
<div class="card-body"> 
    <div class="col-xl-12 col-lg-12 col-sm-12 col-12 m-auto">
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
      </div>
      </section>     
@include('admin.footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>