<a href="{{route('abonent.index')}}">Back</a>
<br /><br />
<form action="/abonent/{{$abonent->id}}" method="POST">
    @csrf
    @method('PUT')
    <label id="phone_number">Phone number</label>
    <input required id="phone_number" type="text" name="phone_number" placeholder="Number" value="{{$abonent->phone_number}}">
    <br />

    <label id="address">Address</label>
    <input required id="address" type="text" name="address" placeholder="Address" value="{{$abonent->address}}">
    <br />

    <label id="owner">Owner</label>
    <input required id="owner" type="text" name="owner" placeholder="Owner" value="{{$abonent->owner}}">
    <br />

    <label id="sum">Sum</label>
    <input required id="sum" type="number" name="sum" placeholder="Sum" value="{{$abonent->sum}}">
    <br />

    <label id="account">Account</label>
    <input required id="account" type="number" name="account" placeholder="Account" value="{{$abonent->account}}">
    <br />

    <button type="submit">Save</button>
</form>
