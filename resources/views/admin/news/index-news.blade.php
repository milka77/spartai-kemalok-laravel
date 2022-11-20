<x-admin-master>
  @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1 class="text-center mb-2">News - Admin Panel</h1>
          
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Category</th>
                <th>Author</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_news as $news)
              <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ Str::limit($news->body, 50) }}</td>
                <td>{{ $news->category->name }}</td>
                <td>{{ $news->user->name }}</td>
               
                <td><a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete <i class="fa-solid fa-trash-can"></i></button>  
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Category</th>
                <th>Author</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  @endsection
  </x-admin-master>