<a href="{{route('abonent.create')}}">Create</a>
<br />
@foreach($abonent as $item)
    {{$item->id}} |
    {{$item->phonenumber}} |
    {{$item->address}} |
    {{$item->owner}} |
    {{$item->sum}} |
    {{$item->account}} |
    <a href="{{route('abonent.show', ['abonent' => $item->id])}}">Show</a> |
    <a href="{{route('abonent.edit', ['abonent' => $item->id])}}">Edit</a> |
    <form action="{{route('abonent.destroy', ['abonent' => $item->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <br />
@endforeach
