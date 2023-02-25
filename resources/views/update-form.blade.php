@extends('layout/main-layout')

@section('form')
<form id="update-form">
    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <div>
        <label for="entityId">Entity ID</label>
        <input id="entityId" name="entityId" type="text">
    </div>

    <div>
        <label for="executable">Code to execute</label>
        <input id="executable" name="executable" type="text">
    </div>

    <button type="submit">Save</button>

</form>

<script>
    const form = document.getElementById('update-form')

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        fetch('/api/update', {
            method: 'post',
            body: JSON.stringify({
                entity_id: form.entityId.value,
                executable: form.executable.value
            }),
            headers: {
                "Accept": "application/json",
                "Authorization": "Bearer " + form.token.value
            }
        })

    })
</script>
@endsection
