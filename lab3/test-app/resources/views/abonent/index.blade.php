<a href="{{route('abonent.create')}}">Create</a>
<br />
@foreach($abonent as $item)
    {{$item->id}} |
    {{$item->phonenumber}} |
    {{$item->address}} |
    {{$item->owner}} |
    {{$item->sum}} |
    {{$item->account}} <br />
@endforeach
