<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{route('books.create')}}" class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-purple-700 hover:bg-purple-900 text-white font-normal py-2 px-4 mr-1 rounded">Add Book</a>

                @if($books && count($books))
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Year</th>
                            <th>Pages</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td> {{ $book->year }} </td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->status }}</td>
                            <td>
                            <a href="{{route('books.edit', ['book'=>$book->id])}}">Edit</a>
                            <a href="{{route('books.show', ['book'=>$book->id])}}">Show</a>

                            <form action="{{ route('books.destroy', ['book'=>$book->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf 
                                <button type="submit">Delete</button>
                            </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    There is no book on database.
                @endif
            </div>
        </div>
    </div>
</x-app-layout>