<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1>Page categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah</a>
    <table border="1">
        <thead class="thead-dark">
            <tr></tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            {{--  @foreach ($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
            </tr>
            @endforeach  --}}
            @forelse ($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No data</td>
            </tr>
            @endforelse

        </tbody>
    </table>

</div>
