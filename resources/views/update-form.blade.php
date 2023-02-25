@extends('layout/main-layout')

@section('form')
<form action="">
    <div>
        <label for="">Token</label>
        <input type="text">
    </div>

    <div>
        <label for="">Entity ID</label>
        <input type="text">
    </div>

    <div>
        <label for="">Code to execute</label>
        <input type="text">
    </div>

    <button type="submit">Save</button>

</form>

<script>
    function submit() {
        fetch('/update')
    }
</script>
@endsection
