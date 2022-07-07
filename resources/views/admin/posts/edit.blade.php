@extends("layouts.admin")

@section("content")
    <div class="container">
        <h1>Modifica "{{$post->title}}"</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route("adminposts.update", $post)}}" method="POST">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                    type="text"
                    value="{{old("title", $post->title)}}"
                    class="form-control @error("title") is-invalid @enderror"
                    id="title" name="title" placeholder="Titolo">
                    @error("title")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto del post</label>
                <textarea class="form-control @error("content") is-invalid @enderror" name="content" id="content" cols="30" rows="10">{{old("content", $post->content)}}
                </textarea>
                @error("content")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>

@endsection
