@extends("layouts.admin")

@section("content")
    <div class="container">
        <h1>Elenco Post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('adminposts.show', $post)}}">VEDI</a>
                            <a class="btn btn-info" href="{{route('adminposts.edit', $post)}}">MODIFICA</a>
                            <form
                                class="d-inline"
                                action="{{route('adminposts.destroy', $post)}}"
                                onsubmit="return confirm('Sei sicuro di voler eliminare \'{{$post->title}}\'?')"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ELIMINA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$posts->links()}}
    </div>
@endsection
