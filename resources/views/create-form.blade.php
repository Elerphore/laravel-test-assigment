@extends('layout/main-layout')

@section('form')
<form id="create-form">
    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <div>
        <label for="entity">Entity to save</label>
        <input id="entity" name="entity" type="text">
    </div>

    <button type="submit">Save</button>

</form>

<script>

    const form = document.getElementById('create-form')

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        console.log("hello")

        fetch('/api/create', {
            method: 'post',
            body: JSON.stringify({
                data: form.entity.value
            }),
            headers: {
                "Authorization": "Bearer " + form.token.value
            }
        })
    })

</script>
@endsection
