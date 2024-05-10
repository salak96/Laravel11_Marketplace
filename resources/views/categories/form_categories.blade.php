<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1>Form categories</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">back</a>

        <form method="post" action="{{ route('categories.store')}}">
            @csrf
            Name <input type="text" class="form-control" placeholder="Name" name="name"><br>
            @error('name')
                {{ $message }}
            @enderror
            Slug <input type="text" class="form-control" placeholder="Name" name="slug"><br>
            @error('slug')
                {{ $message }}
            @enderror
            icon <input type="text" class="form-control" placeholder="Name" name="icon"><br>
            <input type="submit" name="save" value="save" class="btn btn-primary"></input>
        </form>
    </div>
</div>
