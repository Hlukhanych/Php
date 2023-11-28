<a href="{{route('abonent.index')}}">Back</a>
<br /><br />
<form action="{{route('abonent.store')}}" method="POST">
    @csrf
    @method('POST')
    <label id="phone_number">Phone number</label>
    <input required id="phone_number" type="text" name="phone_number" placeholder="Number">
    <br />

    <label id="address">Address</label>
    <input required id="address" type="text" name="address" placeholder="Address">
    <br />

    <label id="owner">Owner</label>
    <input required id="owner" type="text" name="owner" placeholder="Owner">
    <br />

    <label id="sum">Sum</label>
    <input required id="sum" type="number" name="sum" placeholder="Sum">
    <br />

    <label id="account">Account</label>
    <input required id="account" type="number" name="account" placeholder="Account">
    <br />

    <button type="submit">Create</button>
</form>
