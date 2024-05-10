<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1>Edit form categories</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">back</a>

        <form method="post" action="{{ route('categories.update', $category->id)}}">
            @method('PUT')
            @csrf
            Name <input type="text" class="form-control" placeholder="name" name="name" value="{{ $category-> name}}"><br>
            @error('name')
                {{ $message }}
            @enderror
            Slug <input type="text" class="form-control" placeholder="slug" name="slug" value="{{$category -> slug }}"><br>
            @error('slug')
                {{ $message }}
            @enderror
            icon <input type="text" class="form-control" placeholder="icon" name="icon" value="{{ $category-> icon}}"><br><br>
            <input type="submit" name="save" value="update" class="btn btn-primary"></input>
        </form>
    </div>
</div>
